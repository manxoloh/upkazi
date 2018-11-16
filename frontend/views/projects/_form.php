<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\Categories;
use dosamigos\tinymce\TinyMce;
use yii\jui\DatePicker;
use kartik\file\FileInput;
use common\models\SkillSet;

/* @var $this yii\web\View */
/* @var $model common\models\Projects */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="projects-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="form-body">
    <div class="row">
    <div class="col-lg-4">	
    	<?= $form->field($model, 'cat_id')->dropDownList(ArrayHelper::map(Categories::find()->all(), 'id', 'name'), ['prompt'=>'-- Select Project Category --']) ?>
    </div>
    <div class="col-lg-4">	
    	<?= $form->field($model, 'project_name')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-lg-4">
    	<?= $form->field($model, 'budget')->textInput(['placeholder'=>'USD'])->hint('1 US Dollar = '.$model->convertCurrency("USD", "KES", 1).' Kenyan Shilling')  ?>
    </div>
    </div>

    <div class="row">
    <div class="col-lg-4">	
    	<?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-lg-4">
    	<?= $form->field($model, 'expected_start_date')->widget(DatePicker::className(),[
                                    'dateFormat' => 'yyyy-MM-dd',
                                    'options'=>[
                                    'class'=>'form-control',
                                ],]) ?>
    </div>
    <div class="col-lg-4">
    	<?= $form->field($model, 'expected_delivery_date')->widget(DatePicker::className(),[
                                    'dateFormat' => 'yyyy-MM-dd',
                                    'options'=>[
                                    'class'=>'form-control',
                                ],]) ?>
    </div>
    </div>

    <?= $form->field($model, 'project_description')->widget(TinyMce::className(), [
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
    <?= $form->field($model, 'responsibilities')->widget(TinyMce::className(), [
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

    <?= $form->field($model, 'requirements')->widget(TinyMce::className(), [
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
    
    <?= $form->field($skills, 'skill_id')->checkboxList(ArrayHelper::map(SkillSet::find()->all(), 'skill_id', 'skill_name')); ?>
    
    <?= $form->field($model, 'document')->widget(FileInput::classname(), [
    //'options' => ['accept' => 'image/*'],
    ]); ?>
    
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Post Project' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
