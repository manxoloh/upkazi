<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ApplicationsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="applications-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'applicant_id') ?>

    <?= $form->field($model, 'client_id') ?>

    <?= $form->field($model, 'project_id') ?>

    <?= $form->field($model, 'cover_letter') ?>

    <?php // echo $form->field($model, 'resume') ?>

    <?php // echo $form->field($model, 'service_fee') ?>

    <?php // echo $form->field($model, 'freelancer_earn') ?>

    <?php // echo $form->field($model, 'award_status') ?>

    <?php // echo $form->field($model, 'completion_status') ?>

    <?php // echo $form->field($model, 'freelancer_payment_status') ?>

    <?php // echo $form->field($model, 'application_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
