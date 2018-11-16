<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model common\models\UserProfile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-profile-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
    <div class="col-lg-4">	
    	<?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-lg-4">	
    	<?= $form->field($model, 'middlename')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-lg-4">
    	<?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-4">	
    	<?= $form->field($model, 'profilePhoto')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
    	    'pluginOptions' => [
    	        'showPreview' => false,
    	        'showCaption' => true,
    	        'showRemove' => false,
    	        'showUpload' => false
    	    ],
        ]); ?>
    </div>
    <div class="col-lg-4">	
    	<?= $form->field($model, 'phone')->textInput() ?>
    </div>
    <div class="col-lg-4">	
    	<?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-4">	
    	<?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-lg-4">
    	<?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-12">	
    	<?= $form->field($model, 'about')->widget(TinyMce::className(), [
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
    </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Update Profile' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success btn-block' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
