<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSkillsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Project Status';
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
				<th>Budget</th>
				<th>Payment Status</th>
				<th>Start Date</th>
				<th>Delivery Date</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$sno = 1;
			foreach ($projects as $project){ ?>
			<tr>
			<td><?= $sno++ ?></td>
				<td>
				<?= $project['project_name']?>
				</td>
				<td>
				<?= $project['budget']?>
				</td>
				<td>
				<?= $project['payment_status']?>
				</td>
				<td>
				<?= $project['expected_start_date']?>
				</td>
				<td>
				<?= $project['expected_delivery_date']?>
				</td>
				<td>
				<a href="<?= Url::to(['/projects/project-files', 'id'=>$project['id']])?>">
					<span class="btn btn-info btn-xs">View Files</span>
				</a>
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
