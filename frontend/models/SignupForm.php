<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $confirm_password;
    //public $verifyCode;
    public $usertype;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            
            ['password', 'required'],
            ['confirm_password', 'required'],
            ['password', 'string', 'min' => 6],
            ['confirm_password', 'compare', 'compareAttribute'=>'password', 'message'=>"Confirm Password does not match with Password"],
            
            // verifyCode needs to be entered correctly
            //['verifyCode', 'captcha'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup($id)
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        if($id == 1){
            $user->usertype = "Client";
        }
        if($id == 2){
            $user->usertype = "Freelancer";
        }
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        if($user->save()){
            $this->activateAccount($user->id);    
            return true;
        }        
    }
    public function activateAccount($id)
    {
        /* @var $user User */
        $user = User::findOne([
            'status' => User::STATUS_DELETED,
            'id' => $id,
        ]);
        
        if (!$user) {
            return false;
        }
        
        if (!User::isPasswordResetTokenValid($user->account_activation_token)) {
            $user->generateAccountActivationToken();
            if (!$user->save()) {
                return false;
            }
        }
        
        return Yii::$app
        ->mailer
        ->compose(
            ['html' => 'accountActivationToken-html', 'text' => 'accountActivationToken-text'],
            ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
            ->setTo($user->email)
            ->setSubject('Account Activation Link for ' . Yii::$app->name)
            ->send();
    }
}
