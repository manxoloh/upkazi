<?php

/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use common\models\Applications;
use common\models\User;
use common\models\Rating;
use common\models\UserEducation;
use common\models\UserSkills;
use common\models\SkillSet;
use common\models\WorkExperience;
use kartik\rating\StarRating;
use common\models\UserProfile;

$this->title = 'Freelancer Profile';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- ==============================================
	 Header
	 =============================================== -->
	 <?php foreach ($data as $row) { ?>	 
	 <header class="header-freelancer">
      <div class="container">
	   <div class="content">
	    <div class="row">
	     <div class="col-lg-12">
	     <?php $avator = $row['avator'] ? $row['avator'] : "default.png"; ?>
          <img src="<?=Yii::getAlias('@web').'/img/users/'.$avator ?>" class="img-thumbnail img-responsive revealOnScroll" data-animation="fadeInDown" data-timeout="200" alt="">
	      <h1 class="revealOnScroll" data-animation="bounceIn" data-timeout="200"> <?= ucfirst($row['firstname']).' '.ucfirst($row['middlename']).' '.ucfirst($row['lastname']) ?></h1>
		  <p class="revealOnScroll" data-animation="fadeInUp" data-timeout="400"><i class="fa fa-map-marker"></i> <?= $row['city'].', '.$row['country'] ?></p>
		  
		 </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
       </div><!-- /.content -->
	  </div><!-- /.container -->
     </header><!-- /header -->
	 
	  <!-- ==============================================
	  Overview Section
	  =============================================== -->
    
      <section class="overview" id="overview">
	   <div class="container">
	    <div class="row">
		
		 <div id="sidebar" class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="list">
		  <div class="list-group">
		  
           <span class="list-group-item active cat-top">
            <em class="fa fa-fw fa-gear text-white"></em>&nbsp;&nbsp;&nbsp;Settings
		   </span>
           <a href="<?= Url::to(['/user-profile/create'])?>" class="list-group-item cat-list">
           <i class="fa fa-user fa-fw"></i>&nbsp;&nbsp;&nbsp;Profile
            <span class="badge text-red-bg">Edit</span>
		   </a>
           <a href="<?= Url::to(['/user-education'])?>" class="list-group-item cat-list">
           <i class="fa fa-graduation-cap fa-fw"></i>&nbsp;&nbsp;&nbsp;Education
            <span class="badge text-red-bg">Edit</span>
		   </a>
           <a href="<?= Url::to(['/work-experience'])?>" class="list-group-item cat-list">
           <i class="fa fa-gears fa-fw"></i>&nbsp;&nbsp;&nbsp;Work Experience
            <span class="badge text-red-bg">Edit</span>
		   </a>
           <a href="<?= Url::to(['/user-skills'])?>" class="list-group-item cat-list">
           <i class="fa fa-star fa-fw"></i>&nbsp;&nbsp;&nbsp;Skills
            <span class="badge text-red-bg">Edit</span>
		   </a>
		 
          </div><!-- /.list-group -->
		 </div> <!-- /.list -->	
		
		 <div class="list">
		  <div class="list-group">
		  
           <span class="list-group-item active cat-top">
            <em class="fa fa-fw fa-envelope text-white"></em>&nbsp;&nbsp;&nbsp;Messages
		   </span>
           <a href="<?= Url::to(['/messages'])?>" class="list-group-item cat-list">
            <em class="fa fa-fw fa-briefcase"></em>&nbsp;&nbsp;&nbsp;All
            <span class="badge text-red-bg">0</span>
		   </a>
           <a href="<?= Url::to(['/messages'])?>" class="list-group-item cat-list">
            <em class="fa fa-fw fa-envelope"></em>&nbsp;&nbsp;&nbsp;Unread
            <span class="badge text-red-bg">0</span>
		   </a>
           <a href="<?= Url::to(['/messages'])?>" class="list-group-item cat-list">
            <em class="fa fa-fw fa-envelope-o"></em>&nbsp;&nbsp;&nbsp;Read
            <span class="badge text-red-bg">0</span>
		   </a>
           <a href="<?= Url::to(['/messages'])?>" class="list-group-item cat-list">
            <em class="fa fa-fw fa-inbox"></em>&nbsp;&nbsp;&nbsp;Inbox
            <span class="badge text-red-bg">0</span>
		   </a>
           <a href="<?= Url::to(['/messages/outbox'])?>" class="list-group-item cat-list">
            <em class="fa fa-fw fa-send"></em>&nbsp;&nbsp;&nbsp;Send
            <span class="badge text-red-bg">0</span>
		   </a>
		 
          </div><!-- /.list-group -->
		 </div><!-- /.list -->	
		 </div><!-- ./.col-lg-4 -->
		 
		 <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 white-2">
		  <div class="about">
		   <h3>Profile Description</h3>
		   <div class="col-lg-12 top-sec">
		   <p><?= $row['about']; ?></p>
		   	<?php foreach (UserSkills::find()->where(['user_id'=>$row['user_id']])->all() as $skill) { ?>
    		<?php $skillName = SkillSet::findOne(['skill_id'=>$skill['skill_id']]); ?>    			   
				<span class="label label-success"><?= $skillName->skill_name; ?></span>
			<?php } ?>
		  </div><!-- /.col-lg-12 --> 	
		
		  <div class="row bottom-sec">
		   
		   <div class="col-lg-12">
			
			<div class="col-lg-12">
			 <hr class="small-hr">
			</div><!-- /.col-lg-12 -->
			<div class="col-lg-2">
			 <h5> Earned </h5>
			 <p>USD. <?= Applications::freelancerEarnings($row['user_id']) ? Applications::freelancerEarnings($row['user_id']) : "0"?></p>
			</div><!-- /.col-lg-2 -->
			<div class="col-lg-2">
			 <h5> Location </h5>
			 <p><i class="fa fa-map-marker"></i> <?= $row['country'] ?></p>
			</div><!-- /.col-lg-2 -->
			<div class="col-lg-2">
			 <h5> Completed </h5>
			 <p> <?= Applications::completedJobs($row['user_id']) ? Applications::completedJobs($row['user_id']) : "0"?> Jobs </p>
			</div><!-- /.col-lg-2 -->
			<div class="col-lg-6">
			 <h5>  Ratings (<?= Rating::find()->where(['user_id'=>$row['user_id']])->average('rating') ? Rating::find()->where(['user_id'=>$row['user_id']])->average('rating') : 0 ?>)</h5>
			 <p><?php 
			 $model = new User();
			 $form = ActiveForm::begin();	
			 $rating_by = !Yii::$app->user->isGuest ? Yii::$app->user->identity->id : null;
			 echo StarRating::widget([
			     'name' => 'rating',
			     'value' => Rating::find()->where(['user_id'=>$row['user_id']])->average('rating'),
			     'pluginOptions' => [
			         'size' => 'xs',
			         'readonly' => false,
			         'showClear' => false,
			         'showCaption' => false,
			     ],
			     'pluginEvents' => [
			         'rating:change' => "function(event, value, caption){
                        var rating_by = '". $rating_by ."';
                        var being_rated = '". $row['user_id'] ."';
                        $.ajax({
                            url:'index.php?r=site/update-rating',
                            method:'post',
                            data:{rating:value, rating_by: rating_by, being_rated: being_rated},
                            dataType:'json',
                            success:function(data){
                                $(event.currentTarget).rating('update',data.rating);
                                $('#".$row['user_id']."').append('<input type=\'hidden\' value=\''+ data.record +'\' id=\'record_id\'><textarea class=\'form-control comment\' id=\'addcomment\'></textarea> <br> <button class=\'btn btn-success btn-sm\' onclick=\'return addComment()\'>Add Comment</bottom>')
                            }
                        });
                    }"
			     ]
			 ]);
			 ActiveForm::end();
			 ?></p>
			</div><!-- /.col-lg-2 -->
		   </div><!-- /.col-lg-12 -->
		  <div class="col-lg-12">		   
			 	<div id="<?= $row['user_id'] ?>"></div>
		 	</div>
		   <div class="col-lg-12">
			
			<div class="col-lg-12">
			 <hr class="small-hr">
			</div><!-- /.col-lg-12 --> 
			
			<!--<div class="col-lg-2"> -->
			<!-- <h5> Phone </h5> -->
			<!-- <p><?= $row['phone']?></p> -->
			<!--</div> --><!-- /.col-lg-3 -->
			<!--<div class="col-lg-3"> -->
			<!-- <h5> Website </h5> -->
			<!-- <p><?= $row['website']?></p> -->
			<!--</div> --><!-- /.col-lg-3 --> 
			<!--<div class="col-lg-3"> -->
			<!-- <h5> Email </h5> -->
			<!-- <p><?= $row['email']?></p> -->
			<!--</div> --><!-- /.col-lg-3 --> 
			
		   </div><!-- /.col-lg-12 -->
		  </div><!-- /.col-lg-12 -->
		  </div><!-- /.about -->

		  <div class="education">		  
		  <h3>Education</h3>
		  <?php
		  $educationRecord = UserEducation::find()->where(['user_id'=>$row['user_id']])->all();
		  foreach ($educationRecord as $record){ ?>
		  <div class="row">
		   <div class="col-lg-12">
			  <div class="col-md-9">
			   <h4><?= $record['course_name'] ?></h4>
			   <p><?= $record['institution'] ?></p>
			   <p>3 Years Course</p>
			  </div><!-- /.col-lg-9 -->
			  <div class="col-md-3">
			   <h4><?= $record['institution'] ?></h4>
			   <?php 
			   if ($record['to_date'] >= date("Y-m-d")){
			       echo '<span class="label label-warning">Ongoing</span>';
			   }else {
			       echo '<span class="label label-success">Completed</span>';
			       }
			   ?>
			  </div><!-- /.col-lg-3 -->
			</div><!-- /.col-lg-12 -->  
		  </div><!-- /.row -->		  
		  <?php } ?>
		  </div><!-- Education-->
		  
		  <div class="work">		  
		  <h3>Work Experience</h3>
		  <?php
		  $workExperience = WorkExperience::find()->where(['user_id'=>$row['user_id']])->all();
		  foreach ($workExperience as $experience){ ?>
		  <div class="row">
		   <div class="col-lg-12">
			  <div class="col-lg-12">
			   <h4><?= $experience['job_title']?></h4>
			   <h5><?= $experience['company_name']?></h5>
			   <h5><?= Yii::$app->formatter->asDate($experience['from_date'], 'long').' - '. Yii::$app->formatter->asDate($experience['to_date'], 'long'); ?></h5>
			   <p><?= $experience['job_responsibilities'] ?></p>
			  </div><!-- /.col-lg-12 -->
			</div> <!-- /.col-lg-12 --> 
		  </div><!-- /.row -->
		  <?php } ?>  
		  </div>
		  <div class="work">		  
		  <h3>Reviews</h3>
		  <?php foreach ($reviews as $review) { ?>
		  	<h5>@<?= User::findOne($review['rating_by'])->username ?></h5>
          	<p><?= $review['comment'] ?></p>
          <?php } ?>
		  </div><!-- Work-->
	     </div><!-- /.col-lg-8 -->
		</div><!-- /.row -->
		
	   </div><!-- /.container --> 
      </section><!-- End section-->
<?php } ?>
<script>
     function addComment()
     {
         var record_id = document.getElementById("record_id").value;
         var comment = document.getElementById("addcomment").value;
         window.location.href = "https://upkazi.com/index.php?r=site/update-rating-comment&id="+record_id+"&comment="+comment;
	 }
     </script>