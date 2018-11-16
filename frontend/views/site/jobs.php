<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use common\models\Categories;
use common\models\ProjectSkills;
use common\models\Applications;
use common\models\User;
use yii\widgets\LinkPager;
use common\models\UserProfile;
use kartik\select2\Select2;
use kartik\typeahead\TypeaheadBasic;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use common\models\Projects;

$this->title = 'Freelance Jobs';
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
		 	<?= $this->render('left', [
		 	    'category' => $category,
		 	    'model'=>$model,
            ]) ?>
		</div><!-- /.col-lg-4 -->
	    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 white">
	    <br>
	    <script>
          (function() {
            var cx = '013397355519489100661:gxot-j69_ta';
            var gcse = document.createElement('script');
            gcse.type = 'text/javascript';
            gcse.async = true;
            gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(gcse, s);
          })();
        </script>
        <gcse:search></gcse:search>
        
		  <h6>We found have over <?= $model->countAllJobs()?> jobs in our database</h6>

		 <?php if ($jobs) { foreach ($jobs as $job){ ?>
		 <div class="job">	
		  <div class="row top-sec">
		   <div class="col-lg-12">
			<div class="col-lg-2 col-xs-12">
			<?php foreach (UserProfile::getUserProfile($job['client_id']) as $avator){
			    if ($avator['avator']){
			        $photo = $avator['avator'];
			    }
			    else {
			        $photo = "default.png";
			    }
			?>
			 <a href="<?= Url::to(['/site/jobpost', 'id'=>$job['id']])?>">
			  <img class="img-responsive" src="<?=Yii::getAlias('@web').'/img/users/'.$photo; ?>" alt="">
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
			<p><?= substr($job['project_description'], 0, 250); ?> ... <a href="<?= Url::to(['/site/jobpost', 'id'=>$job['id']])?>">Read More</a></p>
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
			 <h5> Location </h5>
			 <p><i class="fa fa-map-marker"></i> <?= $job['location']; ?></p>
			</div>
			<div class="col-lg-2">
			 <h5> Budget </h5>
			 <p>USD. <?= $job['budget']?></p>
			</div>
			<div class="col-lg-2">
			 <h5> Applicants </h5>
			 <p><?= Applications::countProjectApplications($job['id']); ?></p>
			</div>
			<div class="col-lg-4">
			 <a href="<?= Url::to(['/applications/create', 'id'=>$job['id']])?>" class="kafe-btn kafe-btn-mint-small"><i class="fa fa-align-left"></i> Send Proposal</a>
			</div>
			
		   </div><!-- /.col-lg-12 -->
		  </div><!-- /.row -->
		 
		 </div><!-- /.job -->		 
		  <?php  } } else { ?>
		  <div class="job">	
		  <div class="row mid-sec">			 
		   <div class="col-lg-12">	
		   <div class="alert alert-danger">
			<h5>Sorry, There are currently no Jobs found under this job category. Please Check Later</h5>
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