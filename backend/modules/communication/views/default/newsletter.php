<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Newsletter';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(['id' => 'newsletter-form']); ?>
    <?= $form->field($model, 'subject')->textInput(['autofocus' => true]) ?>                        
    <?= $form->field($model, 'content')->textarea() ?>
    
    <div class="footer text-center">
    	<?= Html::submitButton('Send Mail', ['class' => 'btn btn-fill btn-warning btn-block', 'name' => 'login-button']) ?>
    </div>
        
<?php ActiveForm::end(); ?>