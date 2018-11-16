<?php
use yii\helpers\Url;
?>
		 <div class="list">
		  <div class="list-group">
		  
           <span class="list-group-item active cat-top">
            <em class="fa fa-fw fa-desktop text-white"></em>&nbsp;&nbsp;&nbsp;Client Projects Tracking
		   </span>
           
           <a href="<?= Url::to(['/projects'])?>" class="list-group-item cat-list">
            <em class="fa fa-fw fa-check-circle-o text-muted"></em>&nbsp;&nbsp;&nbsp;Posted Projects
            <span class="badge text-red-bg">View</span>
		   </a>
           <a href="<?= Url::to(['/projects/project-status', 'id'=>'AWARDED'])?>" class="list-group-item cat-list">
            <em class="fa fa-fw fa-check-circle-o text-muted"></em>&nbsp;&nbsp;&nbsp;Awarded Projects
            <span class="badge text-red-bg">View</span>
		   </a>
           <a href="<?= Url::to(['/projects/project-status', 'id'=>'COMPLETED'])?>" class="list-group-item cat-list">
            <em class="fa fa-fw fa-check-circle-o text-muted"></em>&nbsp;&nbsp;&nbsp;Completed Projects
            <span class="badge text-red-bg">View</span>
		   </a>
		 
          </div><!-- /.list-group -->
		 </div> <!-- /.list -->	
		 
		 <div class="list">
		  <div class="list-group">
		  
           <span class="list-group-item active cat-top">
            <em class="fa fa-fw fa-desktop text-white"></em>&nbsp;&nbsp;&nbsp;Freelancer Projects Tracking
		   </span>
           
           <a href="<?= Url::to(['/applications/applied'])?>" class="list-group-item cat-list">
            <em class="fa fa-fw fa-check-circle-o text-muted"></em>&nbsp;&nbsp;&nbsp;Projects you have Applied for
            <span class="badge text-red-bg">View</span>
		   </a>
           <a href="<?= Url::to(['/applications/awarded', 'status'=>'AWARDED'])?>" class="list-group-item cat-list">
            <em class="fa fa-fw fa-check-circle-o text-muted"></em>&nbsp;&nbsp;&nbsp;Projects you have been awarded
            <span class="badge text-red-bg">View</span>
		   </a>
           <a href="<?= Url::to(['/applications/awarded', 'status'=>'COMPLETED'])?>" class="list-group-item cat-list">
            <em class="fa fa-fw fa-check-circle-o text-muted"></em>&nbsp;&nbsp;&nbsp;Projects you have completed
            <span class="badge text-red-bg">View</span>
		   </a>
		 
          </div><!-- /.list-group -->
		 </div> <!-- /.list -->
		 <div class="list">
		  <div class="list-group">
		  
           <span class="list-group-item active cat-top">
            <em class="fa fa-fw fa-envelope text-white"></em>&nbsp;&nbsp;&nbsp;Messages
		   </span>
           <a href="jobs.html" class="list-group-item cat-list">
            <em class="fa fa-fw fa-briefcase"></em>&nbsp;&nbsp;&nbsp;All
            <span class="badge text-red-bg">0</span>
		   </a>
           <a href="jobs.html" class="list-group-item cat-list">
            <em class="fa fa-fw fa-envelope"></em>&nbsp;&nbsp;&nbsp;Unread
            <span class="badge text-red-bg">0</span>
		   </a>
           <a href="jobs.html" class="list-group-item cat-list">
            <em class="fa fa-fw fa-envelope-o"></em>&nbsp;&nbsp;&nbsp;Read
            <span class="badge text-red-bg">0</span>
		   </a>
           <a href="jobs.html" class="list-group-item cat-list">
            <em class="fa fa-fw fa-inbox"></em>&nbsp;&nbsp;&nbsp;Inbox
            <span class="badge text-red-bg">0</span>
		   </a>
           <a href="jobs.html" class="list-group-item cat-list">
            <em class="fa fa-fw fa-send"></em>&nbsp;&nbsp;&nbsp;Send
            <span class="badge text-red-bg">0</span>
		   </a>
		 
          </div><!-- /.list-group -->
		 </div><!-- /.list -->	