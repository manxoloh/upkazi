<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel common\models\WorkExperienceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Work Experiences';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- ==============================================
	 Header
	 =============================================== -->	 
     <header class="header-jobs">
      <div class="container">
	   <div class="content">
	    <div class="row">
		 <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
		  <a href="<?= Url::to(['/projects/create'])?>" class="kafe-btn kafe-btn-mint full-width revealOnScroll" data-animation="bounceIn" data-timeout="400"><i class="fa fa-tags"></i> Post a Job, It's Free!</a>
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

		  <h3><?= Html::a('Add New Work Experience Record', ['create'], ['class' => 'btn btn-success']) ?></h3>
		  
		 <?php if ($experience) { foreach ($experience as $info){ ?>
		 <div class="job">	
		  <div class="row top-sec">
		   <div class="col-lg-12">
			<div class="col-lg-12 col-xs-12"> 
			 <h4><a href="<?= Url::to(['/user-profile', 'id'=>$info['user_id']])?>"><?= $info['job_title']?></a></h4>
			 <h5><?= $info['company_name'] ?></h5>
			</div><!-- /.col-lg-12 -->
			
		   </div><!-- /.col-lg-12 -->
		  </div><!-- /.row -->
		  
		  <div class="row mid-sec">			 
		   <div class="col-lg-12">			 
		   <div class="col-lg-12">
			<hr class="small-hr">
			<p><?= $info['job_responsibilities']?></p>
		   </div><!-- /.col-lg-12 -->
		   </div><!-- /.col-lg-12 -->
		  </div><!-- /.row -->
		  <div class="row bottom-sec">
		   <div class="col-lg-12">
			
			<div class="col-lg-12">
			 <hr class="small-hr">
			</div> 
			
			<div class="col-lg-2">
			 <h5> From Date </h5>
			 <p><?= $info['from_date'] ?></p>
			</div>
			<div class="col-lg-2">
			 <h5>To Date </h5>
			 <p><?= $info['to_date'] ?></p>
			</div>
			
			<div class="col-lg-6">
			 <a href="<?= Url::to(['/work-experience/update', 'id'=>$info['id']])?>" data-method="post" class="kafe-btn kafe-btn-mint-small btn-info"><i class="fa fa-edit"></i> Update</a>
			 <a href="<?= Url::to(['/work-experience/delete', 'id'=>$info['id']])?>" data-method="post" data-confirm="Are you sure you want to delete this Record" class="kafe-btn kafe-btn-mint-small btn-danger"><i class="fa fa-trash"></i> Delete</a>
			 
			 </div>
			
		   </div><!-- /.col-lg-12 -->
		  </div><!-- /.row -->
		 
		 </div><!-- /.job -->		 
		  <?php  } } else { ?>
		  <div class="job">	
		  <div class="row mid-sec">			 
		   <div class="col-lg-12">	
		   <div class="alert alert-danger">
			<h5>Sorry, You have not created any education record! <a href="<?= Url::to(['/work-experience/create'])?>">Click Here to Add Education Record</a></h5>
			</div>
		   </div><!-- /.col-lg-12 -->
		  </div><!-- /.row -->
		 </div><!-- /.job -->	
		  <?php } ?>
	
		 <div class="page text-center">
			<?= LinkPager::widget(['pagination' => $pagination]) ?>
		 </div><!-- /.page -->
		 
	    </div><!-- /.col-lg-8 -->
	   </div><!-- /.row -->
	  </div><!-- /.container-fluid -->
     </section><!-- /section -->  