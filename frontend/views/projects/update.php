<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Projects */

$this->title = 'Update Project: ' . $model->project_name;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<!-- ==============================================
	 Header
	 =============================================== -->	 
     <header class="header-jobs">
      <div class="container">
	   <div class="content">
	    <div class="row">
		 <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
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
	   
	    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
		 	<?= $this->render('client_menu') ?>
		</div><!-- /.col-lg-4 -->
	    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 white">	

		  <h3>Update Project: <?= $model->project_name; ?> </h3>
		  <div class="job">	
		  <div class="row top-sec">
		   <div class="col-lg-12">		   
			<div class="col-lg-12 col-xs-12">
    		  	<?= $this->render('_form', [
                'model' => $model,
                'skills' => $skills,
                ]) ?>
		    </div><!-- /.col-lg-12 -->
		   </div><!-- /.row -->
		  </div>
		 </div>
	    </div><!-- /.col-lg-8 -->
	   </div><!-- /.row -->
	  </div><!-- /.container-fluid -->
     </section><!-- /section -->  	
