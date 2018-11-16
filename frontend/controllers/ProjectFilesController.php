<?php

namespace frontend\controllers;

use Yii;
use common\models\ProjectFiles;
use common\models\ProjectFilesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Projects;
use yii\web\UploadedFile;

/**
 * ProjectFilesController implements the CRUD actions for ProjectFiles model.
 */
class ProjectFilesController extends Controller
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
     * Lists all ProjectFiles models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ProjectFiles();
        $searchModel = $dataProvider->find(['submitted_by'=>Yii::$app->user->identity->id])->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single ProjectFiles model.
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
     * Creates a new ProjectFiles model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($project_id)
    {
        $model = new ProjectFiles();
        
        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            
            $model->project_files = UploadedFile::getInstances($model, 'project_files');
            
                foreach ($model->project_files as $file) {
                    $filename = rand(0, 1000000000). '.' . $file->extension;
                    if($file->saveAs(Yii::getAlias('@webroot').'/files/' . $filename)){
                        
                        $fileInstance = new ProjectFiles();
                        $fileInstance->project_id = $project_id;
                        $fileInstance->submitted_by = Yii::$app->user->identity->id;
                        $fileInstance->filename = $filename;
                        $fileInstance->save();
                    }
                }
                
                $message = "Project file have been submitted successfully<br/>";
                Yii::$app->session->setFlash('success', $message);
                return $this->redirect(['index']);
        }
        return $this->render('create',
            ['model' => $model]
            );
    }
    public function actionAccept($id, $project_id, $status)
    {        
        $model = $this->findModel($id);
        $model->status = $status;
        $model->save();
        if ($status=="ACCEPTED"){
            $terminate = Projects::findOne(['id'=>$project_id]);
            $terminate->status = "COMPLETED";
            $terminate->save();
        }
        return $this->redirect(['/projects/project-files', 'id'=>$project_id]);
    }

    /**
     * Updates an existing ProjectFiles model.
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
     * Deletes an existing ProjectFiles model.
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
     * Finds the ProjectFiles model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProjectFiles the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProjectFiles::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
