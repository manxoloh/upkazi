<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Sign Up User';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- ==============================================
	 Header
	 =============================================== -->	 
	 <header class="header-login">
      <div class="container">
	   <div class="content">
        <div class="row">
	     <h1 class="revealOnScroll" data-animation="fadeInDown"><i class="fa fa-coffee"></i> Sign Up</h1>
		 <p>First, tell us what you're looking for.</p>
        </div><!-- /.row -->
       </div><!-- /.content -->
	  </div><!-- /.container -->
     </header><!-- /.header -->
	 
     <!-- ==============================================
     Signup Section
     =============================================== -->
	 <section class="signup">
	  <div class="container">
	   <div class="row">
	   
	    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
		
		 <div class="item text-center revealOnScroll" data-animation="slideInLeft" data-timeout="200">
		  <span class="fa-stack fa-4x">
		   <i class="fa fa-circle fa-stack-2x"></i>
		   <i class="fa fa fa-user fa-stack-1x text-mint"></i>
		  </span>
		  <h4>I want to hire a Freelancer</h4>
		  <p>Find, collaborate with, and pay an expert.</p>
		  
		  <a href="<?= Url::to(['/site/signup', 'id'=>'1'])?>" class="kafe-btn kafe-btn-mint">HIRE </a><br>
		  
		 </div><!-- /.item -->
		 
		</div><!-- /.col-lg-5 -->
		
		<div class="col-lg-2 col-lg-2 col-sm-2 col-xs-12 divider text-center">
		  <span class="or">OR</span>
		</div><!-- /.col-lg-2 -->
		
		<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
		
		 <div class="item text-center revealOnScroll" data-animation="slideInRight" data-timeout="200">
		  <span class="fa-stack fa-4x">
		   <i class="fa fa-circle fa-stack-2x"></i>
		   <i class="fa fa fa-user-md fa-stack-1x text-mint"></i>
		  </span>
		  <h4>I am looking for online work.</h4>
		  <p>Find freelance projects and grow your business.</p>
		  
		  <a href="<?= Url::to(['/site/signup', 'id'=>2])?>" class="kafe-btn kafe-btn-mint">Work</a>
		 </div><!-- /.item -->		
		
		</div><!-- /.col-lg-5 -->
		
	   </div><!-- /.row -->
	  </div><!-- /.container -->
	 </section><!-- /section -->
	 