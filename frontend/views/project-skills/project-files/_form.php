<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\ProjectFiles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-files-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'project_files[]')->widget(FileInput::classname(), [
        'options' => ['multiple' => true],
        'pluginOptions' => ['previewFileType' => 'any'],
            
            'resizeImages'=>true,
    ])->hint('To upload Multiple Project Files (Ctrl + Select Project Files)');?>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Submit Project Files' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
