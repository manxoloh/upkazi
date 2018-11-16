<?php
use yii\helpers\Url;
?>		
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