<?php

use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProjectFilesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Project Files';
$this->params['breadcrumbs'][] = $this->title;
?>
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
            
!-- ==============================================
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
	    <h3>Submitted Project Document Files</h3>	
		  <div class="job">	
		  <div class="row top-sec">
		   <div class="col-lg-12">		   
			<div class="col-lg-12 col-xs-12">
			<table id="datatable" class="table table-striped table-condensed table-responsive">
			<thead>
			<tr>
				<th>Project Name</th>
				<th>File Name</th>
				<th>Status</th>
				<th>Submission Date</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($searchModel as $file){ ?>
			<tr>
				<td><?= $file['project_id'] ?></td>
				<td><?= $file['filename'] ?></td>
				<td><?= $file['status'] ?></td>
				<td><?= $file['submission_date'] ?></td>
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

