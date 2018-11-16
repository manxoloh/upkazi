<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\jui\DatePicker;
use yii\helpers\ArrayHelper;
use common\models\InstitutionType;

/* @var $this yii\web\View */
/* @var $model common\models\UserEducation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-education-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-lg-4">
        <?= $form->field($model, 'institution_category')->dropDownList(ArrayHelper::map(InstitutionType::find()->orderBy('name')->all(), 'name', 'name')) ?>
    </div>
    <div class="col-lg-4">
    	<?= $form->field($model, 'institution')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-lg-4">
    	<?= $form->field($model, 'course_name')->textInput(['maxlength' => true]) ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
    	<?= $form->field($model, 'from_date')->widget(DatePicker::className(),[
                                    'dateFormat' => 'yyyy-MM-dd',
                                    'options'=>[
                                    'class'=>'form-control',
                                ],]) ?>
    </div>
    <div class="col-lg-4">
    	<?= $form->field($model, 'to_date')->widget(DatePicker::className(),[
                                    'dateFormat' => 'yyyy-MM-dd',
                                    'options'=>[
                                    'class'=>'form-control',
                                ],]) ?>
    </div>
    <div class="col-lg-4">
    	<?= $form->field($model, 'certificate')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
    	    'pluginOptions' => [
    	        'showPreview' => false,
    	        'showCaption' => true,
    	        'showRemove' => false,
    	        'showUpload' => false
    	    ],
        ]); ?>
    </div>
</div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Save Record' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
