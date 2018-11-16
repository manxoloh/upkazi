<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Lock Screen';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="full-page lock-page" data-color="orange" data-image="theme/assets/img/full-screen-image-4.jpg">   
        
    <!--   you can change the color of the filter page using: data-color="blue | azure | green | orange | red | purple" -->
        <div class="content">
			<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
    			<div class="user-profile">        
                    <div class="author">
                        <img class="avatar" src="theme/assets/img/default-avatar.png" alt="...">
                    </div> 
                    <h4><?= $username ?></h4>   
                    <div class="form-group">
                    	<?= $form->field($model, 'username')->hiddenInput(['value'=>$username])->label(false) ?>                       
                		<?= $form->field($model, 'password')->passwordInput(['class'=>'form-control', 'placeholder'=>'Enter Password'])->label(false) ?>
                	</div>
                	<?= Html::submitButton('Unlock', ['class' => 'btn btn-neutral btn-round btn-fil btn-wd', 'name' => 'login-button']) ?>
                </div>  
            <?php ActiveForm::end(); ?>
        </div>
        
    	<footer class="footer footer-transparent">
            <div class="container">
                <p class="copyright pull-right">
                    &copy; <?= date("Y") ?> <a href="https://upkazi.com" target="_blank">Upkazi. The #1 Marketplace In Kenya</a>
                </p>
            </div>
        </footer>
    </div> 