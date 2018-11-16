<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Request password reset';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- ==============================================
	 Header
	 =============================================== -->	 
     <header class="header-jobs">
      <div class="container">
	   <div class="content">
	    
       </div><!-- /.content -->
	  </div><!-- /.container -->
     </header><!-- /header -->
	 
     <!-- ==============================================
	 Jobs Section
	 =============================================== -->
<section class="jobslist">
	  <div class="container-fluid">
	   <div class="row-fluid">
	   
	    <div class="col-lg-2">
		</div><!-- /.col-lg-2 -->
	    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 white">
	    
		<h1 class="text-center"><?= Html::encode($this->title) ?></h1>
		  <div class="job">	
		  <div class="row top-sec">
		   <div class="col-lg-12">	
		   <div class="col-lg-2">	
		   </div>	   
			<div class="col-lg-8 col-xs-12">
        	<p class="text-danger">Please fill out your email. A link to reset password will be sent there.</p>
                <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
    
                    <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
    
                    <div class="form-group">
                        <?= Html::submitButton('Send', ['class' => 'btn btn-primary']) ?>
                    </div>
    
                <?php ActiveForm::end(); ?>
		    </div><!-- /.col-lg-12 -->
		   </div><!-- /.row -->
		  </div>
		 </div>
	    </div><!-- /.col-lg-8 -->
	   </div><!-- /.row -->
	  </div><!-- /.container-fluid -->
     </section><!-- /section --> 
     <br><br>