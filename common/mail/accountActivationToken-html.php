<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$url = Yii::$app->urlManager->createAbsoluteUrl(['site/activate-account', 'token' => $user->account_activation_token]);
$activationLink = str_replace("backend", "frontend", $url);
?>
<div class="account-activation">
    <p>Greetings,</p>
<h3>Welcome to Upkazi</h3>
	<p>Thank you <?= $user->username; ?> for registering with Upkazi. We are glad that you have joined the best freelance platform in Kenya.
    </p>
    <p>Kindly follow the link below to activate your account:</p>

    <p><?= Html::a('Activate Account', $activationLink) ?></p>
    
    <p>Regards,</p>
    <p>Upkazi Team</p>
</div>
