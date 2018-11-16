<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\WorkExperience */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="work-experience-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-6">
        	<?= $form->field($model, 'job_title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6">
        	    <?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
        <?= $form->field($model, 'from_date')->widget(DatePicker::className(),[
                                        'dateFormat' => 'yyyy-MM-dd',
                                        'options'=>[
                                        'class'=>'form-control',
                                    ],]) ?>
        </div>
        <div class="col-lg-6">
        <?= $form->field($model, 'to_date')->widget(DatePicker::className(),[
                                        'dateFormat' => 'yyyy-MM-dd',
                                        'options'=>[
                                        'class'=>'form-control',
                                    ],]) ?>
        </div>
    </div>
    
    <?= $form->field($model, 'job_responsibilities')->widget(TinyMce::className(), [
            'options' => ['rows' => 6],
            'language' => 'en',
            'clientOptions' => [
                'plugins' => [
                    "advlist autolink lists link charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste"
                ],
                'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            ]
        ]);?>
        
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Add Experience' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
