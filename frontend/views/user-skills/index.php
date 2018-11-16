<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use common\models\SkillSet;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSkillsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Skills';
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

		  <h3><?= Html::a('Add More Skills', ['create'], ['class' => 'btn btn-success']) ?></h3>
		  <div class="job">	
		  <div class="row top-sec">
		   <div class="col-lg-12">		   
			<div class="col-lg-12 col-xs-12">
			<table id="datatable" class="table table-striped table-condensed table-responsive">
			<thead>
			<tr>
				<th>S/N</th>
				<th>Skill Name</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$sno = 1;
			foreach ($searchModel as $skill){ ?>
			<tr>
			<td><?= $sno++ ?></td>
				<td>
					<?php $skillName = SkillSet::findOne(['skill_id'=>$skill['skill_id']]); ?>
					<?= $skillName->skill_name ?>
				</td>
				<td>
					<a href="<?= Url::to(['/user-skills/delete', 'id'=>$skill['id']])?>" data-method="post" data-confirm="Are you sure you want to delete this Record" class="kafe-btn kafe-btn-mint-small btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
				</td>
			</tr>
			<?php } ?>
			</tbody>
			</table>
		    </div><!-- /.col-lg-12 -->
		   </div><!-- /.row -->
		  </div>
		 </div>
	    </div><!-- /.col-lg-8 -->
	   </div><!-- /.row -->
	  </div><!-- /.container-fluid -->
     </section><!-- /section -->  	
