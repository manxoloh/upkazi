<?php

use yii\helpers\Url;
use common\models\ProjectSkills;
use common\models\Applications;
use yii\widgets\LinkPager;
use common\models\UserProfile;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProjectsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Projects';
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

		  <h3>My Projects</h3>
		  
		 <?php if ($jobs) { foreach ($jobs as $job){ ?>
		 <div class="job">	
		  <div class="row top-sec">
		   <div class="col-lg-12">
			<div class="col-lg-2 col-xs-12">
			<?php foreach (UserProfile::getUserProfile($job['client_id']) as $row){ ?>
			<a href="<?= Url::to(['/site/profile', 'id'=>$row['user_id']])?>">
			 <?php $avator = $row['avator'] ? $row['avator'] : "default.png"; ?>
			  <img class="img-responsive" src="<?=Yii::getAlias('@web').'/img/users/'.$avator ?>" alt="">
			 </a>
			 <?php } ?>
			</div><!-- /.col-lg-2 -->
			<div class="col-lg-10 col-xs-12"> 
			 <h4><a href="<?= Url::to(['/site/jobpost', 'id'=>$job['id']])?>"><?= $job['project_name']?></a></h4>
			 <?php foreach (UserProfile::getUserProfile($job['client_id']) as $row){ ?>
			 <h5><?= ucfirst($row['firstname']).' '.ucfirst($row['middlename']).' '.ucfirst($row['lastname'])?> <small><?= '@'.ucfirst($row['username']) ?></small></h5>
			 <?php } ?>
			</div><!-- /.col-lg-10 -->
			
		   </div><!-- /.col-lg-12 -->
		  </div><!-- /.row -->
		  
		  <div class="row mid-sec">			 
		   <div class="col-lg-12">			 
		   <div class="col-lg-12">
			<hr class="small-hr">
			<p><?= $job['project_description']?></p>
			<?php foreach ((array) ProjectSkills::getProjectSkills($job['id']) as $skill){ ?>
			<span class="label label-success"><?= $skill['skill_name']?></span>
			<?php } ?>
		   </div><!-- /.col-lg-12 -->
		   </div><!-- /.col-lg-12 -->
		  </div><!-- /.row -->
		  
		  <div class="row bottom-sec">
		   <div class="col-lg-12">
			
			<div class="col-lg-12">
			 <hr class="small-hr">
			</div> 
			
			<div class="col-lg-2">
			 <h5> Posted </h5>
			 <p><?= $model->timeElapsed(strtotime($job['date_posted'])) ?></p>
			</div>
			<div class="col-lg-2">
			 <h5> Budget </h5>
			 <p>USD. <?= $job['budget']?></p>
			</div>
			<div class="col-lg-2">
			 <h5> Applicants </h5>
			 <p><?= Applications::countProjectApplications($job['id']); ?></p>
			</div>
			<div class="col-lg-6">
			<?php 
			if (Applications::countProjectApplications($job['id'])>0){ ?>
			 <a href="<?= Url::to(['/projects/update', 'id'=>$job['id']])?>" data-method="post"><button type="button" class="btn kafe-btn-mint-small btn-info" disabled><i class="fa fa-edit"></i> Update</button></a>
			 <a href="<?= Url::to(['/projects/delete', 'id'=>$job['id']])?>" data-method="post" data-confirm="Are you sure you want to delete this project?"><button type="button" class="btn kafe-btn-mint-small btn-danger" disabled><i class="fa fa-trash"></i> Delete </button></a>
			 <?php } else { ?>
			 <a href="<?= Url::to(['/projects/update', 'id'=>$job['id']])?>" data-method="post" class="btn kafe-btn-mint-small btn-info"><i class="fa fa-edit"></i> Update</a>
			 <a href="<?= Url::to(['/projects/delete', 'id'=>$job['id']])?>" data-method="post" data-confirm="Are you sure you want to delete this project?" class="btn kafe-btn-mint-small btn-danger"><i class="fa fa-trash"></i> Delete</a>
			 <?php } ?>
			 <a href="<?= Url::to(['/projects/applications', 'id'=>$job['id']])?>" class="btn kafe-btn-mint-small"><i class="fa fa-align-left"></i> View Applications</a> 
			 </div>
			
		   </div><!-- /.col-lg-12 -->
		  </div><!-- /.row -->
		 
		 </div><!-- /.job -->		 
		  <?php  } } else { ?>
		  <div class="job">	
		  <div class="row mid-sec">			 
		   <div class="col-lg-12">	
		   <div class="alert alert-danger">
			<h5>Sorry, You have not posted any project here! <a href="<?= Url::to(['/projects/create'])?>">Click Here to Post your Project</a></h5>
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