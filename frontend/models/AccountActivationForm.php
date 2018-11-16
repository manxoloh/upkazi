<?php
namespace frontend\models;

use yii\base\Model;
use yii\base\InvalidParamException;
use common\models\User;

/**
 * Password reset form
 */
class AccountActivationForm extends Model
{

    /**
     * @var \common\models\User
     */
    private $_user;


    /**
     * Creates a form model given a token.
     *
     * @param string $token
     * @param array $config name-value pairs that will be used to initialize the object properties
     * @throws \yii\base\InvalidParamException if token is empty or not valid
     */
    public function __construct($token, $config = [])
    {
        if (empty($token) || !is_string($token)) {
            throw new InvalidParamException('Account activation token cannot be blank.');
        }
        $this->_user = User::findByAccountActivationToken($token);
        if (!$this->_user) {
            throw new InvalidParamException('Wrong account activation token.');
        }
        parent::__construct($config);
    }

    /**
     * Activates.
     *
     * @return bool if account was activated.
     */
    public function activateAccount()
    {
        $user = $this->_user;
        $user->status = 10;
        $user->removeAccountActivationToken();
        return $user->save();
    }
}
