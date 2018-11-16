<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
<!-- ==============================================
	 Header
	 =============================================== -->	 
	 <header class="header-login">
      <div class="container">
	   <div class="content">
        <div class="row">
	     <h1 class="revealOnScroll" data-animation="fadeInDown"><i class="fa fa-coffee"></i> Register</h1>
		 <p>New Here? Create Account.</p>
        </div><!-- /.row -->
       </div><!-- /.content -->
	  </div><!-- /.container -->
     </header><!-- /header -->
	 
     <!-- ==============================================
     Banner Section
     =============================================== -->
	 <section class="banner-login">
	  <div class="container">
	   <div class="row">
	   
	    <main class="main main-signup col-lg-12">
	     <div class="col-lg-6 col-lg-offset-3 text-center">
		  <div class="form-sign">
		    <div class="form-head">
			 <h3>Register</h3>
			</div><!-- /.form-head -->			
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <div class="form-body">
			
             <div class="form-row">
			  <div class="form-controls">			  
                <?= $form->field($model, 'email')->textInput(['autofocus' => true, 'class'=>'field', 'placeholder'=>'Email']) ?>
			  </div><!-- /.form-controls -->
             </div><!-- /.form-row -->

		     <div class="form-row">
		      <div class="form-controls">
		      <?= $form->field($model, 'username')->textInput(['class'=>'field', 'placeholder'=>'Username']) ?>
			  </div><!-- /.form-controls -->
		     </div><!-- /.form-row -->
			 
             <div class="form-row">
			  <div class="form-controls">
			  <?= $form->field($model, 'password')->passwordInput(['class'=>'field', 'placeholder'=>'Password']) ?>
			  </div><!-- /.form-controls -->
             </div><!-- /.form-row -->
			 
             <div class="form-row">
			  <div class="form-controls">
			  <?= $form->field($model, 'confirm_password')->passwordInput(['class'=>'field', 'placeholder'=>'Confirm Password']) ?>
			  </div><!-- /.form-controls -->
             </div><!-- /.form-row -->
		   
			 </div><!-- /.form-body -->
	
			 <div class="form-foot">
			  <div class="form-actions">
			  <?= Html::submitButton('Signup', ['class' => 'form-btn', 'name' => 'signup-button']) ?>
			  </div><!-- /.form-actions -->
			 </div><!-- /.form-foot -->
			 
            <?php ActiveForm::end(); ?>
		   </div><!-- /.form-sign -->
		  </div><!-- /.shell -->
		 </main>
		
	   </div><!-- /.row -->
	  </div><!-- /.container -->
	 </section><!-- /section -->
</div>
