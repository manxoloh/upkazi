<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Vacancies */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vacancies-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ind_id')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reference_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vacancy_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'min_salary')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'max_salary')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'start_date')->textInput() ?>

    <?= $form->field($model, 'end_date')->textInput() ?>

    <?= $form->field($model, 'relocate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'driving_licence')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'applied')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'available_from')->textInput() ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'posting_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
