<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProjectsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="projects-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cat_id') ?>

    <?= $form->field($model, 'client_id') ?>

    <?= $form->field($model, 'project_name') ?>

    <?= $form->field($model, 'project_description') ?>

    <?php // echo $form->field($model, 'responsibilities') ?>

    <?php // echo $form->field($model, 'requirements') ?>

    <?php // echo $form->field($model, 'budget') ?>

    <?php // echo $form->field($model, 'location') ?>

    <?php // echo $form->field($model, 'document') ?>

    <?php // echo $form->field($model, 'reference_token') ?>

    <?php // echo $form->field($model, 'pesapal_traking_id') ?>

    <?php // echo $form->field($model, 'payment_method') ?>

    <?php // echo $form->field($model, 'payment_status') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'expected_start_date') ?>

    <?php // echo $form->field($model, 'expected_delivery_date') ?>

    <?php // echo $form->field($model, 'date_posted') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
