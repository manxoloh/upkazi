<?php

namespace backend\modules\jobs\controllers;

use Yii;
use common\models\ApplicationStatus;
use common\models\Vacancies;
use common\models\VacanciesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Applications;
use common\models\Interviews;
use common\models\Ratings;
use Twilio\Rest\Client;
use common\models\Notifications;
use common\models\Questions;
use common\models\RatingCategories;
use common\models\Scale;
use common\models\ScaleLegend;

/**
 * VacanciesController implements the CRUD actions for Vacancies model.
 */
class VacanciesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Vacancies models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = Vacancies::find()->all();
        
        return $this->render('index', [
            'model' => $model,
        ]);
    }
    public function actionApplications()
    {
        $model = Applications::find()->all();
        
        return $this->render('applications', [
            'model' => $model,
        ]);
    }
    public function actionInvite($app_id, $email, $name)
    {        
        $model = new Interviews();
        $status = new ApplicationStatus();
        $model->app_id = $app_id;
        if ($model->load(Yii::$app->request->post())) {
            $model->app_id = $app_id;
            $model->pnl_id= $model->pnl_id;
            $model->venue = $model->venue;
            $model->interview_date = $model->interview_date;
            $model->save();
            
            if ($model->save() && $status->load(Yii::$app->request->post())){
                
                $con = Yii::$app->getDb();
                
                $sql = 'UPDATE application_status SET to_date="'.date("Y-m-d").'"
                        WHERE app_id="'.$app_id.'" AND to_date IS NULL';
                $command = $con->createCommand($sql);
                if ($command->execute())
                {
                    $status->stt_id = $status->stt_id;
                    $status->app_id = $app_id;
                    $status->from_date = date("Y-m-d");
                    
                    if ($status->save())
                    {
                        Notifications::sendSms("+254704400725", "Testing Account");
                        Yii::$app->mailer->compose()
                        ->setFrom('maithyakavyu@outlook.com')
                        ->setTo($email)
                        ->setSubject('Invitation For Job Interview')
                        ->setHtmlBody('Congratulations <b>'.$name.'</b>, <br><br>You have been Invited for an Interview with us for the postion you had previously applied. <br><br><b> Venue: </b> '.$model->venue.' <br><br><b> Date: </b> '.$model->interview_date.' <br><br> Regards,<br> Human Resource Manager')
                        ->send();
                        return $this->redirect(['/jobs']);
                    }
                }
            }
        }        
        else
        {
            return $this->renderAjax('invite', [
                'model' => $model,
                'status'=>$status,
            ]);
        }
    }
    public function actionInterview()
     {
        $model    =new Ratings();
        $student = new Interviews();
        //$stud = $student->getStudentDetails();
        $scales   = ScaleLegend::getScale();
        $question = Questions::getCategory();
        $categories =RatingCategories::getRatingCategory();
        
        //var_dump($scales);die();
        
        if ($model->load(Yii::$app->request->post())){
            
            $rates = $_POST['UniRating']['rate'];
            
            foreach ((array)$rates as $rate){
                $newRating = new Ratings();
                $newRating->scl_id = $newRating->scl_id;
                $newRating->qst_id = $newRating->qst_id;
                $newRating->rate = $rate;
                $newRating-save();
                $newRating->getErrors();
                
                //var_dump($rate);
            }
            //return $this->redirect(['interview']);
        } else {
            return $this->renderAjax('interview', [
                'model'=> $model,
                'inter' => $student,
                'scales'=>$scales,
                'question' =>$question,
                'categories'=>$categories,
                //stud' => $stud
            ]);
        }
    }
    /**
     * Displays a single Vacancies model.
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
     * Creates a new Vacancies model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Vacancies();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->vcn_id]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Vacancies model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->vcn_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Vacancies model.
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
     * Finds the Vacancies model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Vacancies the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Vacancies::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
