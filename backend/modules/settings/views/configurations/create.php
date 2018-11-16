<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model common\models\Configurations */

$this->title = 'Create Configurations';
$this->params['breadcrumbs'][] = ['label' => 'Configurations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
<?php $form = ActiveForm::begin(['id' => 'form-update']); ?>
    <div class="col-md-12">
        <div class="card">
            <div class="content">

    		<?= $form->field($model, 'logo')->fileInput() ?>
                       
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                        	<?= $form->field($model, 'company_code')->textInput() ?>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                        	<?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                </div>
                <div class="row">                
                    <div class="col-md-6">
                        <div class="form-group">
                        	<?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                	<div class="col-md-6">
                        <div class="form-group">
                        	<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        	<?= $form->field($model, 'physical_location')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        	<?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>  
                </div>
                <div class="row">                     
                    <div class="col-md-12">
                        <div class="form-group">
                        	<?= $form->field($model, 'address')->textarea(['rows' => 3]) ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
            </div>
        </div>
        
    </div>    
	<?php ActiveForm::end(); ?>
</div>
