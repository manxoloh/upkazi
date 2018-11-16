<?php

use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MessagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Messages';
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

		  <h3><?= Html::a('Compose New', ['create'], ['class' => 'btn btn-success']) ?></h3>
		  <div class="job">	
		  <div class="row top-sec">
		   <div class="col-lg-12">		   
			<div class="col-lg-12 col-xs-12">
			<table id="datatable" class="table table-striped table-condensed table-responsive">
			
			<tbody>
			<?php
			foreach ($searchModel as $message){ ?>
			<tr>
			<td width="50"><input type="checkbox"><i class="fa fa-star-o pull-right"></i></td>
				<td>
					<?= $message['sender']?>
				</td>
				<td>
					<?= $message['subject']?>
				</td>
				<td>
					<?= $message['body']?>
				</td>
				<td>
				<i class="fa fa-reply"></i>
				<?php if ($message['attachment']){ ?>
				<i class="fa fa-paperclip pull-right"></i>
				<?php } ?>
				</td>
				<td>
				<?= date("M d, Y", strtotime($message['timestamp']))?>
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
