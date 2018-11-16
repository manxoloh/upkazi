<?php

namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Mail is the model behind sending email notifications.
 */
class Mail extends Model
{
	/**
	 * Sends an email to the specified email address using the information collected by this model.
	 *
	 * @param string $email the target email address
	 * @return bool whether the email was sent
	 */
	public static function sendEmail($to, $from, $subject, $body)
	{
		return Yii::$app->mailer->compose()
		->setTo($to)
		->setFrom($from)
		->setSubject($subject)
		->setTextBody($body)
		->send();
	}
}
