<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- ==============================================
	 Header
	 =============================================== -->	 
     <header class="header-jobs">
      <div class="container">
	   <div class="content">
	    <div class="row">
		 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		  <a href="<?= Url::to(['/projects/create']) ?>" class="kafe-btn kafe-btn-mint full-width revealOnScroll" data-animation="bounceIn" data-timeout="400"><i class="fa fa-tags"></i> Post a Job, It's Free!</a>
		 </div><!-- /.col-lg-3 -->
        </div><!-- /.row -->
       </div><!-- /.content -->
	  </div><!-- /.container -->
     </header><!-- /header -->
	 
     <!-- ==============================================
	 Jobs Section
	 =============================================== -->
	<section class="jobslist">
	  <div class="container-fluid">
	   <div class="row-fluid">
	   
	    <div class="col-lg-4">
		 	<?= $this->render('left', [
		 	    'category' => $category,
		 	    'model'=>$model,
            ]) ?>
		</div><!-- /.col-lg-4 -->
	    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 white">
	    
		  <h3>Contact us</h3>
		  <div class="job">	
		   <div class="col-lg-12">	
		   <?php if (Yii::$app->session->hasFlash('success')): ?>
              <div class="alert alert-success alert-dismissable">
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
              <h4><i class="icon fa fa-check"> </i> Success</h4>
              <?= Yii::$app->session->getFlash('success') ?>
              </div>
            <?php endif; ?>
            <?php if (Yii::$app->session->hasFlash('error')): ?>
              <div class="alert alert-danger alert-dismissable">
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
              <h4><i class="icon fa fa-close"> </i> Error</h4>
              <?= Yii::$app->session->getFlash('error') ?>
              </div>
            <?php endif; ?>
            	   
	    	<?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
	    	<?php 
	    	if (!Yii::$app->user->isGuest){
	    	    $name = Yii::$app->user->identity->username;
	    	    $email = Yii::$app->user->identity->email;
	    	}else {
	    	    $name = null;
	    	    $email = null;
	    	}
	    	?>

                <?= $form->field($contact, 'name')->textInput(['autofocus' => true, 'value'=>$name]) ?>

                <?= $form->field($contact, 'email')->textInput(['value'=>$email]) ?>

                <?= $form->field($contact, 'subject') ?>

                <?= $form->field($contact, 'body')->textarea(['rows' => 6]) ?>

                <?= $form->field($contact, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-9">{input}</div></div>',
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
		   </div><!-- /.row -->
		  </div>
	    </div><!-- /.col-lg-8 -->
	   </div><!-- /.row -->
	  </div><!-- /.container-fluid -->
     </section><!-- /section -->  	