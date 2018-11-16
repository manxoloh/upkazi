<?php

namespace backend\modules\communication\controllers;

use yii\web\Controller;
use common\models\Newsletter;
use common\models\User;
use Yii;

/**
 * Default controller for the `communication` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionNewsletter(){
        $model = new Newsletter();
        if($model->load(Yii::$app->request->post()) && $model->save()){
            $users = User::find()->where(['not', ['account_activation_token'=>null]])->all();
            
            foreach ($users as $user){
                Yii::$app
                ->mailer                
                ->compose(
                    ['html' => 'accountActivationToken-html', 'text' => 'accountActivationToken-text'],
                    ['user' => $user]
                    )
                    ->setFrom('info@upkazi.com')
                    ->setTo($user['email'])
                    ->setSubject('Account Activation')
                    ->send();
            }
            foreach (User::find()->all() as $users){
                Yii::$app
                ->mailer
                ->compose()
                    ->setFrom('info@upkazi.com')
                    ->setTo($users['email'])
                    ->setSubject($model->subject)
                    ->send();
            }
            return $this->redirect('index');
        }
        else {
            return $this->renderAjax('newsletter',[
                'model'=>$model,
            ]);
        }
    }
}
