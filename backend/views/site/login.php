<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="full-page login-page" data-color="orange" data-image="theme/assets/img/full-screen-image-1.jpg">   
        
    <!--   you can change the color of the filter page using: data-color="blue | azure | green | orange | red | purple" -->
        <div class="content">
            <div class="container">
                <div class="row">                   
                    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                        <div class="card ">
                            <div class="header text-center">Login</div>
                            <div class="content">
                        			<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                                        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>                        
                                        <?= $form->field($model, 'password')->passwordInput() ?>
                                        <?= $form->field($model, 'rememberMe')->checkbox([
                                            'data-toggle'=>'checkbox',
                                            'template'=>'<div class="form-group">
                                                <label class="checkbox">
                                                    <span class="icons"><span class="first-icon fa fa-square-o"></span><span class="second-icon fa fa-check-square-o"></span></span>{input}
                                                    {label}
                                                </label>    
                                            </div>']) ?>
                                            <?= Html::a('Forgot Password', ['site/request-password-reset']) ?>
                                            
                                        <div class="footer text-center">
                                        	<?= Html::submitButton('Login', ['class' => 'btn btn-fill btn-warning btn-wd', 'name' => 'login-button']) ?>
                                        </div>
                                            
                                    <?php ActiveForm::end(); ?>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    	
    	<footer class="footer footer-transparent">
            <div class="container">
                <p class="copyright pull-right">
                    &copy; <?= date("Y") ?> <a href="https://upkazi.com" target="_blank">Upkazi. The #1 Marketplace In Kenya</a>
                </p>
            </div>
        </footer>

    </div>  