<?php
use yii\helpers\Url;
use common\models\Projects;
?>
		 <div class="list">
		  <div class="list-group">
		  
           <span class="list-group-item active cat-top">
            <em class="fa fa-fw fa-list text-white"></em>&nbsp;&nbsp;&nbsp;Categories
            <span class="badge"><?= $model->countAllJobs()?>+</span>
		   </span>		   
           <a href="<?= Url::to(['/site/jobs']) ?>" class="list-group-item cat-list">
            <em class="fa fa-fw fa-check-circle-o text-muted"></em>&nbsp;&nbsp;&nbsp;All Jobs
            <span class="badge text-red-bg"><?= $model->countAllJobs()?></span>
		   </a>
		   <?php foreach ($category as $row) { ?>
           <a href="<?= Url::to(['/site/job-category', 'id'=>$row['id']]) ?>" class="list-group-item cat-list">
            <em class="fa fa-fw fa-check-circle-o text-muted"></em>&nbsp;&nbsp;&nbsp;<?= $row['name']?>
            <span class="badge text-red-bg"><?= $model->countCategoryJobs($row['id']) ?></span>
		   </a>
		   <?php } ?>
          </div><!-- /.list-group -->
		 </div><!-- /.list --> 
		
		 <div class="list">
		  <div class="list-group">
		  
           <span class="list-group-item active cat-top">
            <em class="fa fa-fw fa-credit-card text-white"></em>&nbsp;&nbsp;&nbsp;Budget
		   </span>
           <a href="<?= Url::to(['/site/job-budget', 'min'=>'0', 'max'=>'150']) ?>" class="list-group-item cat-list">
            <em class="fa fa-fw fa-money text-muted"></em>&nbsp;&nbsp;&nbsp;Below USD. 150
            <span class="badge text-red-bg"><?= Projects::getBudgetCount(0, 150)?></span>
		   </a>
           <a href="<?= Url::to(['/site/job-budget', 'min'=>'150', 'max'=>'300']) ?>" class="list-group-item cat-list">
            <em class="fa fa-fw fa-money text-muted"></em>&nbsp;&nbsp;&nbsp;USD. 151 - USD. 300
            <span class="badge text-red-bg"><?= Projects::getBudgetCount(151, 300)?></span>
		   </a>
           <a href="<?= Url::to(['/site/job-budget', 'min'=>'300', 'max'=>'600']) ?>" class="list-group-item cat-list">
            <em class="fa fa-fw fa-money text-muted"></em>&nbsp;&nbsp;&nbsp; USD. 301 - USD. 600
            <span class="badge text-red-bg"><?= Projects::getBudgetCount(301, 600)?></span>
		   </a>
           <a href="<?= Url::to(['/site/job-budget', 'min'=>'600', 'max'=>'1200']) ?>" class="list-group-item cat-list">
            <em class="fa fa-fw fa-money text-muted"></em>&nbsp;&nbsp;&nbsp;USD. 601 - USD. 1,200
            <span class="badge text-red-bg"><?= Projects::getBudgetCount(601, 1200)?></span>
		   </a>
           <a href="<?= Url::to(['/site/job-budget', 'min'=>'1200', 'max'=>'2400']) ?>" class="list-group-item cat-list">
            <em class="fa fa-fw fa-money text-muted"></em>&nbsp;&nbsp;&nbsp;USD. 1,201 - USD. 2,400
            <span class="badge text-red-bg"><?= Projects::getBudgetCount(1201, 2400)?></span>
		   </a>
           <a href="<?= Url::to(['/site/job-budget', 'min'=>'2400', 'max'=>'4800']) ?>" class="list-group-item cat-list">
            <em class="fa fa-fw fa-money text-muted"></em>&nbsp;&nbsp;&nbsp;USD. 2,401 - USD. 4,800
            <span class="badge text-red-bg"><?= Projects::getBudgetCount(2401, 4800)?></span>
		   </a>
           <a href="<?= Url::to(['/site/job-budget', 'min'=>'4800', 'max'=>'100000000']) ?>" class="list-group-item cat-list">
            <em class="fa fa-fw fa-money text-muted"></em>&nbsp;&nbsp;&nbsp;Over USD. 4,800
            <span class="badge text-red-bg"><?= Projects::getBudgetCount(4801, 100000000)?></span>
		   </a>
		 
          </div><!-- /.list-group -->
		 </div> <!-- /.list -->	