<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSkillsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Applied Projects';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- ==============================================
	 Header
	 =============================================== -->	 
     <header class="header-jobs">
      <div class="container">
	   <div class="content">
	    <div class="row">
		 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
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
	   
	    <div class="col-lg-4">
		 	<?= $this->render('client_menu') ?>
		</div><!-- /.col-lg-4 -->
	    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 white">	

		  <h3>Project Status</h3>
		  <div class="job">	
		  <div class="row top-sec">
		   <div class="col-lg-12">		   
			<div class="col-lg-12 col-xs-12">
			<table id="datatable" class="table table-striped table-condensed table-responsive">
			<thead>
			<tr>
				<th>S/N</th>
				<th>Project Name</th>
				<th>Earn</th>
				<th>Payment Status</th>
				<th>Start Date</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$sno = 1;
			foreach ($applied as $project){ ?>
			<tr>
			<td><?= $sno++ ?></td>
				<td>
				<?= $project['project_name']?>
				</td>
				<td>
				<?= $project['freelancer_earn']?>
				</td>
				<td>
				<?php if ($project['freelancer_payment_status']=="NOT PAID") { ?>
				<span class="btn btn-danger btn-xs"><?= $project['freelancer_payment_status']?></span>
				<?php } ?>
				<?php if ($project['freelancer_payment_status'] == "PAID") { ?>
				<span class="btn btn-success btn-xs"><?= $project['freelancer_payment_status']?></span>
				<?php } ?>
				</td>
				<td>
				<?= $project['expected_delivery_date']?>
				</td>
				<td>
				<?php if ($project['award_status'] == "AWARDED") { ?>
				<span class="btn btn-success btn-xs">AWARDED</span>
				<?php } ?>
				<?php if ($project['award_status'] == "NOT AWARDED") { ?>
				<span class="btn btn-warning btn-xs">PENDING</span>
				<?php } ?>
				<?php if ($project['award_status'] == "DENIED") { ?>
				<span class="btn btn-danger btn-xs">DENIED</span>
				<?php } ?>
				</td>
				<td>
				<?php if ($project['award_status'] == "AWARDED") { ?>
				<a href="<?= Url::to(['/project-files/create', 'project_id'=>$project['project_id']]) ?>">
				<span class="btn btn-info btn-xs">SEND FILES</span>
				</a>
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
