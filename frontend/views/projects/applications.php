<?php
use yii\helpers\Url;
use common\models\Applications;
use yii\widgets\LinkPager;
use common\models\UserProfile;
use common\models\UserSkills;
use common\models\SkillSet;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProjectsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Project Applications';
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
		 	<?= $this->render('client_menu') ?>
		</div><!-- /.col-lg-4 -->
	    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 white">	

		  <h3>Project Applications</h3>
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
		 <?php if ($applications) { foreach ($applications as $application){ ?>
		 <div class="job">	
		  <div class="row top-sec">
		   <div class="col-lg-12">
			<div class="col-lg-2 col-xs-12">
			 <a href="<?= Url::to(['/site/profile', 'id'=>$application['applicant_id']]) ?>">
			 <?php $avator = $application['avator'] ? $application['avator'] : "default.png"; ?>
			  <img class="img-responsive" src="<?=Yii::getAlias('@web').'/img/users/'.$avator ?>" alt="">
			 </a>
			</div><!-- /.col-lg-2 -->
			<div class="col-lg-10 col-xs-12"> 
			<?php foreach (UserProfile::getUserProfile($application['applicant_id']) as $row){ ?>
			 <h4><a href="<?= Url::to(['/site/profile', 'id'=>$application['applicant_id']]) ?>"><?= ucfirst($row['firstname']).' '.ucfirst($row['middlename']).' '.ucfirst($row['lastname'])?></a></h4>
			 <h5><?= '@'.ucfirst($row['username']) ?> <span class="btn btn-info btn-sm pull-right" data-toggle="collapse" data-target="#<?= $application['applicant_id'] ?>" title="Click to Review Application Details">Review Applicant</span></h5>
			 <?php } ?>
			</div><!-- /.col-lg-10 -->
			
		   </div><!-- /.col-lg-12 -->
		  </div><!-- /.row -->
		  <div class="row mid-sec">			 
		   <div class="col-lg-12">			 
		   <div class="col-lg-12">
			<hr class="small-hr">
			<h4>Applicant Profile</h4>
			<hr class="small-hr">
			<p><?= substr($application['about'], 0, 500); ?> ... <a href="<?= Url::to(['/site/profile', 'id'=>$application['applicant_id']]) ?>">Read More</a></p>		
			<div id="<?= $application['applicant_id'] ?>" class="collapse">
			<hr class="small-hr">	
			<h4>Resume</h4>
			<hr class="small-hr">
			<?= $application['resume']?>
			<hr class="small-hr">	
			<h4>Application Cover Letter</h4>
			<hr class="small-hr">
			<?= $application['cover_letter']?>
			</div>
			<?php foreach (UserSkills::find()->where(['user_id'=>$row['user_id']])->all() as $skill) { ?>
    		<?php $skillName = SkillSet::findOne(['skill_id'=>$skill['skill_id']]); ?>    			   
				<span class="label label-success"><?= $skillName->skill_name; ?></span>
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
			 <h5> Earned </h5>
			 <p>USD <?= Applications::freelancerEarnings($application['applicant_id']) ? Applications::freelancerEarnings($application['applicant_id']) : "0"?></p>
			</div>
			<div class="col-lg-2">
			 <h5> Location </h5>
			 <p><i class="fa fa-map-marker"></i> <?= $application['country']?></p>
			</div>
			<div class="col-lg-2">
			 <h5> Completed</h5>
			 <p> <?= Applications::completedJobs($row['user_id']) ? Applications::completedJobs($row['user_id']) : "0"?> Jobs </p>
			</div>
			<div class="col-lg-2">
			 <h5> Ratings (126)</h5>
			 <p><i class="fa fa-star"></i>
			 <i class="fa fa-star"></i>
			 <i class="fa fa-star"></i>
			 <i class="fa fa-star"></i>
			 <i class="fa fa-star"></i></p>
			</div>
			<div class="col-lg-4">
			<?php if ($application['award_status'] == "NOT AWARDED"){ ?>
			 <a href="<?= Url::to(['/projects/payment-method', 'id'=>$application['app_id'], 'project_id'=>$application['project_id']])?>" class="kafe-btn kafe-btn-mint-small btn-warning btn-block" title="Click to Award this project to this applicant"><i class="fa fa-check"></i> Award Project</a>
			<?php } elseif ($application['award_status']=="AWARDED") { ?>
			<a class="kafe-btn kafe-btn-mint-small btn-block"><i class="fa fa-gift"></i> <?= $application['award_status']; ?></a>
			<?php } else { ?>
			<a class="kafe-btn kafe-btn-mint-small btn-danger btn-block"><i class="fa fa-ban"></i> DENIED </a>
			<?php } ?>
			</div>
			
		   </div><!-- /.col-lg-12 -->
		  </div><!-- /.row -->
		 
		 </div><!-- /.job -->		 
		  <?php  } } else { ?>
		  <div class="job">	
		  <div class="row mid-sec">			 
		   <div class="col-lg-12">	
		   <div class="alert alert-danger">
			<h5>Sorry, There are no applications to this project. please check again later</h5>
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
	<div class="modal" id="Modal">
    	<div class="modal-dialog">
    		<div class="modal-sm">
    			<div class="modal-content">
    				<div class="modal-header">
    					<h4>
    						Project Payment
    					</h4>
    				</div>
    				<div class="modal-body"></div>
    			</div>
    		</div>
    	</div>
    </div>