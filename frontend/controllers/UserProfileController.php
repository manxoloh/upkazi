<?php

namespace frontend\controllers;

use Yii;
use common\models\UserProfile;
use common\models\UserProfileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * UserProfileController implements the CRUD actions for UserProfile model.
 */
class UserProfileController extends Controller
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
     * Lists all UserProfile models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserProfileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserProfile model.
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
     * Creates a new UserProfile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $check = UserProfile::find()->where(['user_id'=>Yii::$app->user->identity->id])->all();
        foreach ($check as $user){
            $user_id = $user['id'];
        }
        if ($check == NULL){
            $model = new UserProfile();
    
            if ($model->load(Yii::$app->request->post())) {                
                
                $model->profilePhoto = UploadedFile::getInstance($model, 'profilePhoto');
                if($model->profilePhoto){
                    $model->profilePhoto->saveAs(Yii::getAlias('@webroot').'/img/users/' . Yii::$app->user->identity->email . '.' . $model->profilePhoto->extension);
                    $avator = Yii::$app->user->identity->email.'.'.$model->profilePhoto->extension;
                }
                else {
                    $avator = null;
                }
                        $model->user_id = Yii::$app->user->identity->id;
                        $model->avator = $avator;
                        $model->firstname = $model->firstname;
                        $model->middlename = $model->middlename;
                        $model->lastname = $model->lastname;
                        $model->phone = $model->phone;
                        $model->website = $model->website;
                        $model->country = $model->country;
                        $model->city = $model->city;
                        $model->about = $model->about;
                        $model->save(false); 
                 
                return $this->redirect(['/site/profile', 'id'=>Yii::$app->user->identity->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
        else {
            return $this->redirect(['update', 'id'=>$user_id]);
        }
    }

    /**
     * Updates an existing UserProfile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->profilePhoto = UploadedFile::getInstance($model, 'profilePhoto');
            if($model->profilePhoto){
                $model->profilePhoto->saveAs(Yii::getAlias('@webroot').'/img/users/' . Yii::$app->user->identity->email . '.' . $model->profilePhoto->extension);
                $avator = Yii::$app->user->identity->email.'.'.$model->profilePhoto->extension;
            }
            else {
                $avator = null;
            }            
            $model->avator = $avator;
            $model->save(false);
            
            return $this->redirect(['/site/profile', 'id'=>Yii::$app->user->identity->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing UserProfile model.
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
     * Finds the UserProfile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserProfile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserProfile::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
