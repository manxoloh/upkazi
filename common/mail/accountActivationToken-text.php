<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */

$activationLink = Yii::$app->urlManager->createAbsoluteUrl(['site/activate-account', 'token' => $user->account_activation_token]);
?>
Hello <?= $user->username ?>,

Follow the link below to activate your account:

<?= $activationLink ?>
