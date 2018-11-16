<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use common\models\ProjectSkills;
use yii\widgets\LinkPager;
use yii\helpers\Url;
use common\models\Applications;
use common\models\UserEducation;
use common\models\UserSkills;
use common\models\SkillSet;
use common\models\UserProfile;
use yii\bootstrap\ActiveForm;
use common\models\User;
use kartik\rating\StarRating;
use kartik\typeahead\TypeaheadBasic;
use common\models\Projects;
use common\models\Categories;
use common\models\Rating;

$this->title = 'Freelancer Profile';
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
		
		 <h6>We found over <?= UserProfile::find()->count(); ?> Freelancers matching your search</h6> 
	<?php foreach ($data as $row) { ?>
		 <div class="job">	
		  
		  <div class="row top-sec">
		   <div class="col-lg-12">
			<div class="col-lg-2 col-xs-12">
			 <a href="#">
			 <?php $avator = $row['avator'] ? $row['avator'] : "default.png"; ?>
			  <img class="img-responsive" src="<?=Yii::getAlias('@web').'/img/users/'.$avator ?>" alt="">
			 </a>
			</div><!-- /.col-lg-2 -->
			<div class="col-lg-10 col-xs-12"> 
			 <h4><a href="<?= Url::to(['/site/profile', 'id'=>$row['user_id']])?>"><?= ucfirst($row['firstname']).' '.ucfirst($row['middlename']).' '.ucfirst($row['lastname']) ?></a></h4>
			 <h5><?= '@'.$row['username'] ?></h5>
			</div><!-- /.col-lg-10 -->
			
		   </div><!-- /.col-lg-12 -->
		  </div><!-- /.row -->
		  
		  <div class="row mid-sec">			 
		   <div class="col-lg-12">			 
		   <div class="col-lg-12">
			<hr class="small-hr">
			<p><?= $row['about'] ?></p>
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
			 <p>USD. <?= Applications::freelancerEarnings($row['user_id']) ? Applications::freelancerEarnings($row['user_id']) : "0"?></p>
			</div>
			<div class="col-lg-2">
			 <h5> Location </h5>
			 <p><i class="fa fa-map-marker"></i> Kenya</p>
			</div>
			<div class="col-lg-2">
			 <h5> Completed </h5>
			 <p> <?= Applications::completedJobs($row['user_id']) ? Applications::completedJobs($row['user_id']) : "0"?> Jobs </p>
			</div>
			<div class="col-lg-2">
			 <h5> Ratings (<?= Rating::find()->where(['user_id'=>$row['user_id']])->average('rating') ? Rating::find()->where(['user_id'=>$row['user_id']])->average('rating') : 0 ?>)</h5>
			 <p>
			 <?php 
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
			 ?>
			 </p>
			</div>
		   </div><!-- /.col-lg-12 -->
		   	<div class="col-lg-12">		   
			 	<div id="<?= $row['user_id'] ?>"></div>
		 	</div>
		  </div><!-- /.row -->
		 </div><!-- /.job -->
		 <?php } ?>
	    </div><!-- /.col-lg-8 -->
	   </div><!-- /.row -->
	  </div><!-- /.container -->
     </section><!-- /section -->	 
     <script>
     function addComment()
     {
         var record_id = document.getElementById("record_id").value;
         var comment = document.getElementById("addcomment").value;
         window.location.href = "https://upkazi.com/index.php?r=site/update-rating-comment&id="+record_id+"&comment="+comment;
	 }
     </script>