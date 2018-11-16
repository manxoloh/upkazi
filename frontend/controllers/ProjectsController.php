<?php

namespace frontend\controllers;

use Yii;
use common\models\Projects;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use common\models\Applications;
use yii\filters\AccessControl;
use common\models\ProjectSkills;
use common\models\ProjectFiles;
use common\models\Payments;
use common\models\UserProfile;
use common\models\PaymentMethod;

/**
 * ProjectsController implements the CRUD actions for Projects model.
 */
class ProjectsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create','update', 'index', 'applications', 'award', 'delete'],
                'rules' => [
                    [ 
                        'allow' => true,
                        'roles' => ['@'],
                        
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Projects models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Projects();
        
        $query = Projects::find()->where(['client_id' => Yii::$app->user->identity->id]);
        $pagination = new Pagination(['defaultPageSize' => 10, 'totalCount' => $query->count()]);
        
        $jobs =  $query->offset($pagination->offset)->limit($pagination->limit) ->all();
        
        
        return $this->render('index', [
            'model'=>$model,
            'jobs'=>$jobs,
            'pagination'=>$pagination,
        ]);
    }
    public function actionProjectStatus($id)
    {
        $model = new Projects();
        
        $projects = Projects::find()->where(['client_id' => Yii::$app->user->identity->id, 'status'=>$id])->all();
        
        return $this->render('project-status', [
            'model'=>$model,
            'projects'=>$projects,
        ]);
    }
    public function actionProjectFiles($id)
    {
        $model = new ProjectFiles();
        
        $projectFiles = ProjectFiles::find()->where(['project_id'=>$id])->all();
        
        return $this->render('project-files', [
            'model'=>$model,
            'projectFiles'=>$projectFiles,
        ]);
    }
    
    /**
     * Displays a single Projects model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    /**
     * Displays a Projects Applications model.
     * @param integer $id
     * @return mixed
     */
    public function actionApplications($id)
    {
        $model = new Applications();
        
        $query = Applications::getProjectApplications($id);
        $pagination = new Pagination(['defaultPageSize' => 10, 'totalCount' => $query->count()]);
        
        $applications =  $query->offset($pagination->offset)->limit($pagination->limit) ->all();
        
        
        return $this->render('applications', [
            'model'=>$model,
            'applications'=>$applications,
            'pagination'=>$pagination,
        ]);
    }
    public function actionPaymentMethod($id, $project_id){
        $budget = (new Projects())->convertCurrency("USD", "KES", Projects::findOne($project_id)->budget);
        $usd = Projects::findOne($project_id)->budget;
        $model = new PaymentMethod();
        if ($model->load(Yii::$app->request->post())) {
            if($model->method_type == "MPESA"){
                return $this->redirect(['award', 'id'=>$id, 'project_id'=>$project_id]);
            }
            else {
                return $this->redirect(['coming-soon', 'id'=>$id, 'project_id'=>$project_id]);
            }
        } else {
            return $this->render('payment-method', [
                'model' => $model,
                'budget'=>$budget,
                'usd'=>$usd,
            ]);
        }
    }
    /**
     * Award Project to Applicant.
     * @param integer $id
     * @return mixed
     */
    public function actionAward($id, $project_id)
    {        
        $model = Projects::findOne(['id' => $project_id]);
        $client = UserProfile::findOne(['user_id'=>Yii::$app->user->identity->id]);
        $model->budget = round($model->convertCurrency("USD", "KES", $model->budget));
        if ($model->load(Yii::$app->request->post())) {
            //maximum execution to 5 seconds
            ini_set('max_execution_time', '60');
            
            //how you change this ones is really up to you
            $data = [
                'callback_url' => 'www.upkazi.com/projects/callback',
                'callback_method' => 'POST',
                'endpoint' => 'https://safaricom.co.ke/mpesa_online/lnmo_checkout_server.php?wsdl',
                'short_code' => '528677',
                'pass_key' => '7dbda323af7019a25ef96e3320b412d15ac5eecaa26679694ae8f94671a789fd',
                'product'=> 'UPKAZI PROJECT SERVICE FEE',
                'amount' => $model->budget,
                'number' => $client->phone,
            ];
            
            $gateway = Payments::getInstance();
            
            //set callback url and method
            $gateway->callbackUrl($data['callback_url']);
            $gateway->callbackMethod($data['callback_method']);
            
            //set mobile billing api endpoint/request url
            $gateway->endPoint($data['endpoint']);
            
            //set merchant id , passkey and product name for mobile billing
            $gateway->merchantID($data['short_code']);
            $gateway->productID($data['product']);
            
            //generate timestamp
            $data['timestamp'] = date("YmdHis",time());
            $data['password'] = base64_encode(hash("sha256", $data['short_code'].$data['pass_key'].$data['timestamp']));
            
            
            //done to override otherwise it should happen for mobile billing
            $gateway->timestamp($data['timestamp']);
            $gateway->password($data['password']);
            
            //this is where we actually perform transactioon
            
            //generate random transaction id
            $MERCHANT_TRANSACTION_ID = strtoupper($gateway->generateRandomString());
            
            //create request checkout
            $response = $gateway->requestCheckout($MERCHANT_TRANSACTION_ID,$data['amount'],$data['number']);
            
            //process this transaction
            $response = $response? $gateway->confirmCheckout($MERCHANT_TRANSACTION_ID) : $response;
            
            //check transaction status
            $response = $response? $gateway->requestStatus($MERCHANT_TRANSACTION_ID) : $response;
            $body = $gateway->responseBody();
            $mpesa_receipt_no = isset($body['MPESA_TRX_ID'])? $body['MPESA_TRX_ID'] : null;
            
            $response = [
                'id' => $MERCHANT_TRANSACTION_ID,
                'mpesa_receipt_no' => $mpesa_receipt_no,
                'message'=>$gateway->message(),
                'success'=> ($response? 1 : 0)
            ];
            
            if($response['success'] == 0){
                $disqualify = Applications::find()
                ->where(['project_id' => $project_id])
                ->andWhere("id != $id")->all();
                
                $model = Applications::findOne(['id' => $id]);
                $model->award_status = 'AWARDED';
                
                if($model->save()){            
                    $project = Projects::findOne(['id' => $project_id]);
                    $project->reference_token = $response['mpesa_receipt_no'];
                    $project->payment_method = "MPESA";
                    $project->payment_status = "PAID";
                    $project->status = "AWARDED";
                    $project->save();
                    
                    foreach ($disqualify as $record){
                        $record->award_status = 'DENIED';
                        $record->save();
                    }
                    Yii::$app->session->setFlash('success', 'Your Project Payment And Awarding Has Been Completed Successfully');
                    return $this->redirect(['applications', 'id' => $project_id]);            
                }
            }
            else {
                Yii::$app->session->setFlash('error', 'Sorry Your Project Payment Could Not Be Completed Please Try Again');
                $this->redirect(['/site/response']);
            }
        }
        else {
            return $this->render('payment', [
                'model' => $model,
                'client'=>$client,
            ]);
        }
        
    }
    
    public function actionComingSoon($id, $project_id)
    { 
        $model = Projects::findOne(['id' => $project_id]);
        $client = UserProfile::findOne(['user_id'=>Yii::$app->user->identity->id]);
        $model->budget = round($model->convertCurrency("USD", "KES", $model->budget));
        $data = [
            'consumer_key'=>'a/wxi3V+yMvS+gdALwuQ0IBoOqbW3rvk',
            'consumer_secret'=>'dMm5KWJUPlrH7ZI/TZ5WdUdx5KE=',
            'iframelink'=>'https://www.pesapal.com/api/PostPesapalDirectOrderV4',
            'amount'=>$model->budget,
            'desc'=>'UPKAZI PROJECT SERVICE FEE',
            'type'=>'MERCHANT',
            'reference'=>rand(50, 100000000000),
            'first_name'=>$client->firstname,
            'last_name'=>$client->lastname,
            'email'=> Yii::$app->user->identity->email,
            'phonenumber'=>$client->phone,
            'callback_url' => 'www.upkazi.com/projects/callback',
        ];
            return $this->render('coming-soon', [
                'data' => $data,
            ]);
        
    }
    /**
     * Creates a new Projects model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Projects();
        $skills = new ProjectSkills();

        if ($model->load(Yii::$app->request->post())) {
            $model->cat_id = $model->cat_id;
            $model->client_id = Yii::$app->user->identity->id;
            $model->project_name = $model->project_name;
            $model->project_description = $model->project_description;
            $model->responsibilities = $model->responsibilities;
            $model->requirements = $model->requirements;
            $model->budget = $model->budget;
            $model->location = $model->location;
            $model->save();
            if ($skills->load(Yii::$app->request->post())) {
                $skillList = $skills->skill_id;
                foreach ((array)$skillList as $skill){
                        $newSkill = new ProjectSkills();
                        $newSkill->project_id = $model->id;
                        $newSkill->skill_id = $skill;
                        $newSkill->save();
                }
            }
            return $this->redirect(['/projects']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'skills'=>$skills,
            ]);
        }
    }

    /**
     * Updates an existing Projects model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        
        $model = $this->findModel($id);
        
        $skills = new ProjectSkills();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
                'skills' => $skills,
            ]);
        }
    }

    /**
     * Deletes an existing Projects model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Projects model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Projects the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Projects::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
