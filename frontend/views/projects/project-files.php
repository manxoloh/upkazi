<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use common\models\SkillSet;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSkillsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Project Files';
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

		  <h3>Project Files</h3>
		  <div class="job">	
		  <div class="row top-sec">
		   <div class="col-lg-12">		   
			<div class="col-lg-12 col-xs-12">
			<table id="datatable" class="table table-striped table-condensed table-responsive">
			<thead>
			<tr>
				<th>S/N</th>
				<th>File Name</th>
				<th>Submission Time</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$sno = 1;
			foreach ($projectFiles as $project){ ?>
			<tr>
			<td><?= $sno++ ?></td>
				<td>
				<a href="<?=Yii::getAlias('@web').'/files/'.$project['filename']; ?>">
				<?= $project['filename']?>
				</a>
				</td>
				<td>
				<?= $project['submission_date']?>
				</td>
				<td>
				<?php if($project['status']=="ACCEPTED") { ?>
					<span class="btn btn-success btn-xs"><?= $project['status']?></span>
				<?php } elseif ($project['status']=="REJECTED") { ?>
					<span class="btn btn-danger btn-xs"><?= $project['status']?></span>
				<?php } else { ?>
					<span class="btn btn-warning btn-xs"><?= $project['status']?></span>
				<?php } ?>
				</td>
				<td>
					<a href="<?= Yii::$app->request->baseUrl.'/files/'.$project['filename']; ?>"><span class="btn btn-info btn-xs">Download</span></a>
					<?php if($project['status']=="PENDING"){ ?>
					<a href="<?= Url::to(['/project-files/accept', 'id'=>$project['id'], 'project_id'=>$project['project_id'], 'status'=>'ACCEPTED'])?>"><span class="btn btn-success btn-xs">Accept</span></a>
					<a href="<?= Url::to(['/project-files/accept', 'id'=>$project['id'], 'project_id'=>$project['project_id'], 'status'=>'REJECTED'])?>"><span class="btn btn-danger btn-xs">Reject</span></a>
					<?php } ?>
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
