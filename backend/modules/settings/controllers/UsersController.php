<?php

namespace backend\modules\settings\controllers;
use Yii;
use yii\web\Controller;
use common\models\User;
use common\models\Addresses;
use yii\filters\VerbFilter;
use common\models\PostalCodes;
use yii\helpers\Json;
use common\models\UserProfile;

/**
 * Users controller for the `settings` module
 */
class UsersController extends Controller
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
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $users= UserProfile::getFreelancers();
                
        Yii::$app->getSession()->setFlash('success', User::find()->count().' Users Found');
        return $this->render('index', ['users'=>$users]);
    }
    /**
     * Renders the profile view for the module
     * @return string
     */
    public function actionProfile($id)
    {
        $model = UserProfile::find()->where(['user_id'=>$id])->one();
        $user = User::findOne($id);
        if ($model->load(Yii::$app->request->isPost)){            
            die("here");
            $model->save(false);
            Yii::$app->getSession()->setFlash('success', 'Profile updated successfully');
        }
                
        return $this->render('profile', ['model'=>$model, 'user'=>$user]);
    }
    public function actionDelete($id)
    {
        User::findOne($id)->delete();
        
        return $this->redirect(['index']);
    }
    public function actionPostalCodes($postalCode){
        $codes = PostalCodes::findOne($postalCode);
        echo json::encode($codes);
    }
}
