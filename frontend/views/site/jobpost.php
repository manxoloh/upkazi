<?php

/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use common\models\Projects;
use common\models\Applications;
use common\models\ProjectSkills;
use common\models\Rating;
use common\models\User;
use common\models\UserProfile;
use kartik\rating\StarRating;
use yii\helpers\Url;

$this->title = 'Job Post Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- ==============================================
	 Header
	 =============================================== -->	
	 <?php foreach ($jobs as $job){?> 
	 <header class="header-jobpost">
      <div class="container">
	   <div class="content">
	    <div class="row">
		 <div class="col-lg-4 col-lg-offset-8 col-md-4 col-md-offset-8 col-sm-6 col-xs-12 animations fade-left d2">
		  <a href="<?= Url::to(['/applications/create', 'id'=>$job['id']])?>" class="kafe-btn kafe-btn-mint full-width revealOnScroll" data-animation="bounceIn" data-timeout="400"><i class="fa fa-star"></i>Send Application as Proposal</a>
		 </div><!-- /.col-lg-3 -->
		 
        </div><!-- /.row -->
       </div><!-- /.content -->
	  </div><!-- /.container -->
     </header><!-- /header -->
	 
     <!-- ==============================================
	 Job Post Section
	 =============================================== -->
	
     <section class="jobpost">
	  <div class="container">
	   <div class="row">
	    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 white">
		
		 <div class="row">
		  <div class="col-lg-12">
		   
           <h4><?= $job['project_name'] ?></h4>
           <hr class="small-hr">
		  </div>		
		 </div> 
		 
		 <div class="row post-top-sec">
		  <div class="col-lg-3">
		   <h5> Posted </h5>
		   <p><?= Projects::timeElapsed(strtotime($job['date_posted']))?></p>
		  </div><!-- /.col-lg-3 -->
		  <div class="col-lg-3">
		   <h5> Location </h5>
		   <p><i class="fa fa-map-marker"></i> <?= $job['location']; ?></p>
		  </div><!-- /.col-lg-3 -->
		  <div class="col-lg-3">
		   <h5> Budget </h5>
		   <p>USD. <?= $job['budget']; ?></p>
		  </div><!-- /.col-lg-3 -->
		  <div class="col-lg-3">
		   <h5> Applicants </h5>
		   <p><?= Applications::countProjectApplications($job['id']); ?></p>
		  </div><!-- /.col-lg-3 -->
		  
		  <div class="col-lg-12">
           <hr class="small-hr">
		  </div> <!-- /.col-lg-12 -->
		 </div><!-- /.row -->
		  
		 <div class="post-bottom-sec"> 
		  <h4>Job Description</h4>
		  <p><?= $job['project_description']; ?></p>
		  
		  <h4>Responsibilities</h4>
		   <p><?= $job['responsibilities'] ?></p>
          
		  <h4>Job Requirment</h4>
		   <p><?= $job['requirements'] ?></p>
		
		  <h4>Skills</h4>
		   <?php foreach ((array) ProjectSkills::getProjectSkills($job['id']) as $skill){ ?>
			<span class="label label-success"><?= $skill['skill_name']?></span>
			<?php } ?>
		
		 </div><!-- /.post-bottom-sec -->		 
		</div><!-- /.col-lg-8 -->
		
	    <div class="col-lg-4">
		
		 <div class="panel user revealOnScroll" data-animation="slideInUp" data-timeout="200">
		  <div class="row text-center">
		   <a href="#">
		   <?php foreach (UserProfile::getUserProfile($job['client_id']) as $row){
		       $avator=$row['avator'];
		   }
		   ?>
		    <img src="<?= Yii::getAlias('@web').'/img/bg/2.jpg' ?>" class="img-responsive panel-img" alt="" />
            
            <div class="col-xs-12 user-avatar">
             <img src="<?= Yii::getAlias('@web').'/img/users/'.$avator ?>" alt="Image" class="img-thumbnail img-responsive">
             <?php foreach (UserProfile::getUserProfile($job['client_id']) as $row){ ?>
			 <h4><?= ucfirst($row['firstname']).' '.ucfirst($row['middlename']).' '.ucfirst($row['lastname'])?></h4>
			 <p><?= '@'.ucfirst($row['username']); ?></p>
			 <?php } ?> 
            </div><!-- /.col-xs-12 -->
		   </a>
          </div><!-- /.row -->
		  
		  <div class="list-group">
           <div class="list-group-item">&nbsp;&nbsp;&nbsp;This Job
            <span class="badge">USD. <?= $job['budget']; ?></span>
		   </div><!-- /.list-group-item -->
           <div class="list-group-item">&nbsp;&nbsp;&nbsp;Rating
            <span class="badge">
		     <?= Rating::find()->where(['user_id'=>$job['client_id']])->average('rating') ?>
		     <i class="fa fa-star"></i>
		    </span>
		   </div><!-- /.list-group-item -->
           <div class="list-group-item">&nbsp;&nbsp;&nbsp;Open Jobs
            <span class="badge"><?= Projects::find()->where(['client_id'=>$job['client_id']])->andWhere(['payment_status'=>'NOT PAID'])->count(); ?></span>
		   </div><!-- /.list-group-item -->
           <div class="list-group-item">&nbsp;&nbsp;&nbsp;Closed Jobs
            <span class="badge"><?= Projects::find()->where(['client_id'=>$job['client_id']])->andWhere(['payment_status'=>'PAID'])->count(); ?></span>
		   </div><!-- /.list-group-item -->
           <div class="list-group-item">&nbsp;&nbsp;&nbsp;Amount Paid Job
            <span class="badge">USD. <?= Projects::find()->where(['client_id'=>$job['client_id']])->andWhere(['payment_status'=>'PAID'])->sum('budget') ? Projects::find()->where(['client_id'=>$job['client_id']])->andWhere(['payment_status'=>'PAID'])->sum('budget') : 0; ?></span>
		   </div><!-- /.list-group-item -->
		  </div><!-- /.list-group -->
		 
		 </div><!-- /.list-group-item -->
		

		 
		</div><!-- /.col-lg-4 -->
		
	   </div><!-- /.row-->
	  </div><!-- /.container -->  	 
	 </section><!-- /section --> 
	 <?php } ?>