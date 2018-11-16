<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = "http://stlebrd://openMeeting/45/100";
?>
<div class="password-reset">
    <p>Hello <?= Html::encode($user->username) ?>,</p>
    <p>A Password Change Request was made for the account associated with this email address <b><?= Html::encode($user->email) ?></b>
    <p>Follow the link below to reset your password:</p>
    <p>Username: <b><?= Html::encode($user->username) ?>;</b>
    <p>Password: <?= Html::a('Click here to reset your Upkazi password', $resetLink, ['class'=>'btn btn-success']) ?></p>
    
    <p>Please Ignore this Email if you did not request this change.</p>
    
    <p>Regards,</p>
    <p>Upkazi Team</p>
</div>
