<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
<header class="header-login">
      <div class="container">
	   <div class="content">
	    <div class="row">
	     <h1 class="revealOnScroll" data-animation="fadeInDown"><i class="fa fa-coffee"></i> Login</h1>
		 <p>Log in and get to work.</p>
        </div><!-- /.row -->
       </div><!-- /.content -->
	  </div><!-- /.container -->
     </header><!-- /header -->
	 
     <!-- ==============================================
     Banner Login Section
     =============================================== -->
	 <section class="banner-login">
	  <div class="container">
	   <div class="row">
	   
	    <main class="main main-signup col-lg-12">
	     <div class="col-lg-6 col-lg-offset-3 text-center">
		  <div class="form-sign">
		   <form method="post">
		    <div class="form-head">
			 <h3>Login</h3>
			</div><!-- /.form-head -->
            <div class="form-body">
			
			 <div class="form-row">
			  <div class="form-controls">
			  <?= $form->field($model, 'username')->textInput(['class'=>'field', 'placeholder'=>'Username'])->label(false) ?>
			  </div><!-- /.form-controls -->
			 </div><!-- /.form-row -->

			 <div class="form-row">
			  <div class="form-controls">
			  <?= $form->field($model, 'password')->passwordInput(['class'=>'field', 'placeholder'=>'Password'])->label(false) ?>
			  </div><!-- /.form-controls -->
			 </div><!-- /.form-row -->
		    </div><!-- /.form-body -->

			<div class="form-foot">
			 <div class="form-actions">
			 <?= Html::submitButton('Login', ['class' => 'form-btn', 'name' => 'login-button']) ?>
			 </div><!-- /.form-actions -->
             <div class="form-head">
			  <a href="<?= Url::to(['/site/request-password-reset'])?>" class="more-link">Forgot Password?</a>
			 </div>
			</div><!-- /.form-foot -->
		   </form>
		   
		  </div><!-- /.form-sign -->
	     </div><!-- /.col-lg-6 -->
        </main>
		
	   </div><!-- /.row -->
	  </div><!-- /.container -->
     </section><!-- /section -->
	 
     <!-- ==============================================
	 Footer Section
	 =============================================== -->
     <div class="footer">
	  <div class="container">
	   <div class="row">
	  
	    <div class="col-md-4 col-sm-6 text-left">
	     <h4 class="heading no-margin">About Us</h4>
		 <hr class="mint">
		 <p>Upkazi.  is the Ultimate Freelance Marketplace  for employers and freelancers to connect, collaborate, and get work done.</p>
		 <p>We work hard to build a great product that is beautifully designed, simple to use, user friendly with great focus on user experience and customer service.</p>
	    </div><!-- /.col-md-4 -->
	   
	    <div class="col-md-2 col-sm-6 text-left">
	     <h4 class="heading no-margin">Company</h4>
		 <hr class="mint">
		 <div class ="no-padding">
		  <a href="<?= Url::to(['/'])?>">Home</a>
		  <a href="<?= Url::to(['/site/about'])?>">About</a>
		  <a href="<?= Url::to(['/site/jobs'])?>">Jobs</a>
		  <a href="<?= Url::to(['/site/freelancers'])?>">Freelancers</a>
		  <a href="<?= Url::to(['/site/how'])?>">How it works</a>
		  <a href="<?= Url::to(['/site/contact'])?>">Contact</a>
		 </div>
	    </div><!-- /.col-md-2 -->	
		
		<div class="col-md-3 col-sm-6 text-left">
	     <h4 class="heading no-margin">Other Services</h4>
		 <hr class="mint">
		 <div class="no-padding">
		<a href="<?= Url::to(['/site/privacy'])?>">Privacy Policy</a>
		  <a href="<?= Url::to(['/site/terms'])?>">Terms of Use</a>
		  <a href="<?= Url::to(['/site/faq'])?>">FAQ</a>		 
		 </div>
	    </div><!-- /.col-md-3 -->	
		
	    <div class="col-md-3 col-sm-6 text-left">
	    <h4 class="heading no-margin">Browse</h4>
		<hr class="mint">
		 <div class="no-padding">
		   <a href="<?= Url::to(['/site/freelancers'])?>">Top Freelancers in Kenya</a>		  
		  </div>
		 </div><!-- /.col-md-3 -->
		 
	    </div><!-- /.row -->
	   <div class="clearfix"></div>
	  </div><!-- /.container-->
     </div><!-- /.footer -->			
	 
	 <!-- ==============================================
	 Made Section
	 =============================================== -->
	 <section class="made">
	  <div class="container">
	   <div class="row">
		<div class="col-lg-10 col-lg-offset-1 text-center">
		 <h4 class="made-with-love">Upkazi.com</h4>
		 <p class="made-with-love-1">Handcrafted with <i class="fa fa-heart"></i> &amp; Much <i class="fa fa-coffee"></i> In Nairobi, Kenya.</p>
		</div>
		<!-- /.col-lg-10 -->
	   </div><!-- /.row -->
	  </div><!-- /.container -->
     </section><!-- /.made -->
<?php ActiveForm::end(); ?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <div class="row">
        <div class="col-lg-5">
                

                

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

        </div>
    </div>
</div>
