<?php

namespace frontend\controllers;

use Yii;
use common\models\Applications;
use common\models\ApplicationsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Projects;
use yii\filters\AccessControl;
use common\models\User;
use common\models\Mail;

/**
 * ApplicationsController implements the CRUD actions for Applications model.
 */
class ApplicationsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'update', 'delete'],
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
     * Lists all Applications models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ApplicationsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * Displays a single Applications model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    public function actionApplied()
    {
        $applied = Applications::getAppliedJobs(Yii::$app->user->identity->id);
        return $this->render('applied', [
            'applied' => $applied,
        ]);
    }
    public function actionAwarded($status)
    {
        
        $applied = Applications::getAppliedJobsStatus(Yii::$app->user->identity->id, $status);
        
        return $this->render('applied', [
            'applied' => $applied,
        ]);
    }
    
    /**
     * Creates a new Applications model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $self = Projects::find()->where(['id'=>$id])->andWhere(['client_id'=>Yii::$app->user->identity->id])->all();
        if($self == null){
            $check = Applications::find()
            ->where(['applicant_id'=>Yii::$app->user->identity->id, 'project_id'=>$id])
            ->all();
            if ($check == NULL){
                $project = Projects::findOne(['id'=>$id]);
                $service_fee = (($project->budget)*0.2);
                $freelancer_earn = (($project->budget)-$service_fee);
                
                $model = new Applications();
                
                if ($model->load(Yii::$app->request->post())) {
                    $model->applicant_id = Yii::$app->user->identity->id;
                    $model->client_id = $project->client_id;
                    $model->project_id = $project->id;
                    $model->cover_letter = $model->cover_letter;
                    $model->resume = $model->resume;
                    $model->service_fee = $service_fee;
                    $model->freelancer_earn = $freelancer_earn;
                    $model->save();
                    
                    $client = User::findOne(['id'=>$project->client_id]);
                    
                    $message = "Hello, ".$client->username." Your project ".$project->project_name." has got new proposal, please login to www.upkazi.com inorder to review them" ;
                    
                    Mail::sendEmail($client->email, Yii::$app->user->identity->email, "New Project Proposal", $message);
                    
                    Yii::$app->session->setFlash('success', 'You Have Successfully Applied For This Job. Be patient as the client processes the applications');
    
                    return $this->redirect(['/site/response']);
                } else {
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }
            }
            else {
                Yii::$app->session->setFlash('error', 'You Have Already Applied For This Job. Be patient as the client processes the applications');
                
                return $this->redirect(['/site/response']);
            }
        }
        else {
            Yii::$app->session->setFlash('error', 'Sorry, cannot apply to your own project');
            
            return $this->redirect(['/site/response']);
        }
    }
    
    /**
     * Updates an existing Applications model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Deletes an existing Applications model.
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
     * Finds the Applications model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Applications the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Applications::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
