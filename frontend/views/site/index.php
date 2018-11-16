<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use common\models\Projects;
use yii\widgets\SocialShareButton;


$this->title = 'Upkazi | Get the job done right';
?>



<header class="header-one">
      <div class="container">
	   <div class="content">
	   
        <div class="row">
		 <h1 class="name revealOnScroll" data-animation="fadeInDown"><i class="fa fa-coffee"></i> Upkazi.</h1>
		 <p class="temp">The #1 Freelance Marketplace In Kenya</p>
         <h1 class="hire revealOnScroll" data-animation="fadeInUp" data-timeout="400">Hire the best Writers in Kenya.</h1>
	     <?php if (Yii::$app->user->isGuest) { ?>
	     <div class="form-row">
		  <div class="radio radio-left">
		   <a href="<?= Url::to(['/site/signup', 'id'=>'1'])?>">HIRE</a>		  
		  </div>
		  <div class="radio radio-right">
		   <a href="<?= Url::to(['/site/signup', 'id'=>'2'])?>">WORK</a>		  
		  </div><!--./radio -->
	 	 </div><!--./form-row -->
	 	 <?php } else { ?>
	 	 <div class="form-row">
		  <div class="radio radio-left">
		   <a href="<?= Url::to(['/site/freelancers'])?>">HIRE</a>		  
		  </div>
		  <div class="radio radio-right">
		   <a href="<?= Url::to(['/site/jobs'])?>">WORK</a>		  
		  </div><!--./radio -->
	 	 </div><!--./form-row -->
	 	 <?php } ?>
        </div><!--./row -->
		
		<div class="row">
		 <div class="col-lg-10 col-lg-offset-1 hidden-xs">
		  <div class="logos">
		   <img src="img/featured-logos.png" class="img-responsive" alt=""/>		  </div>
		  <!--./logos -->
		 </div>
		 <!--./col-lg-10 -->
		</div><!--./row --> 
		
       </div><!--./content -->
	  </div><!--./container -->
     </header><!--./header -->
	 <!-- ==============================================
	 Freelance Services Section
	 =============================================== -->
     <section id="services" class="services">
	  <div class="container text-center">
	  
	   <div class="row">
	    <div class="col-lg-12">
		 <h3>Browse Freelance Services</h3>
		 <hr class="mint">
		 <p class="top-p">View over 10 available services by category.</p>
		 
		 <div class="col-lg-4 col-md-4 col-sm-6">
		  <a href="<?= Url::to(['/site/job-category', 'id'=>1]) ?>" class="hover">
		   <div class="features one">
		    <span class="fa-stack fa-3x">
			 <i class="fa fa-circle fa-stack-2x"></i>
			 <i class="fa fa-code fa-stack-1x fa-inverse"></i>			
			</span><!-- /span -->
			<h4>Essay Writing</h4>
		   </div><!-- /.features -->
		   <div class="spacer">
			<p><?= substr("It is dreadful writing essays especially when there is a load of them. Be it a basic, complex or critical essay, we have the most sought-after writers to express your skill keenly to ensure you attain your success. Don’t be overwhelmed!.", 0, 240) ?></p>
			<p><b>Over <?= $model->countCategoryJobs('1') ?> services</b></p>
		   </div> <!-- /.spacer -->
		  </a>		 
		 </div><!-- /.col-lg-4 -->

		 
		 <div class="col-lg-4 col-md-4 col-sm-6">
		  <a href="<?= Url::to(['/site/job-category', 'id'=>2]) ?>">
		   <div class="features two">
		    <span class="fa-stack fa-3x">
			 <i class="fa fa-circle fa-stack-2x"></i>
			 <i class="fa fa-eye fa-stack-1x fa-inverse"></i>			
			</span><!-- /span -->
			<h4>Research Paper Writing</h4>
		   </div><!-- /.features -->
		   <div class="spacer">
			<p><?= substr("There is a lot required into presenting a finished excellent paper. There is a lot of information from several resources, choose a writer who you think will mind all that matters and integrate this. Let us help you write a research paper, term paper, thesis or similar academic papers.", 0, 240) ?></p>
			<p><b>Over <?= $model->countCategoryJobs('2') ?> services</b></p>
		   </div> <!-- /.spacer -->
		  </a>		 
		 </div><!-- /.col-lg-4 -->
		 
		 <div class="col-lg-4 col-md-4 col-sm-6">
		  <a href="<?= Url::to(['/site/job-category', 'id'=>3]) ?>">
		   <div class="features three">
		    <span class="fa-stack fa-3x">
			 <i class="fa fa-circle fa-stack-2x"></i>
			 <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>			
			</span><!-- /span -->
			<h4>Dissertation Writing</h4>
		   </div><!-- /.features -->
		   <div class="spacer">
			<p><?= substr("Our professionals take a great deal of time into this, to ensure there is proper communication of the subject given and apply all rules to a proper document. Our selected writers put in all passion of work to gather evidence and present a crystal clear coherent document. Given how important this is since it really defines a student’s transition to scholar!", 0, 240) ?></p>
			<p><b>Over <?= $model->countCategoryJobs('3') ?> services</b></p>
		   </div> <!-- /.spacer -->
		  </a>		 
		 </div><!-- /.col-lg-4 -->
		  
		 </div><!-- /.col-lg-12 -->
		</div><!-- /.row -->
		
		<div class="row">
		<div class="col-lg-12">
		
		  <div class="col-lg-4 col-md-4 col-sm-6">
		  <a href="<?= Url::to(['/site/job-category', 'id'=>4]) ?>">
		   <div class="features four">
		    <span class="fa-stack fa-3x">
			 <i class="fa fa-circle fa-stack-2x"></i>
			 <i class="fa fa-cogs fa-stack-1x fa-inverse"></i>			
			</span><!-- /span -->
			<h4>Assignment Help</h4>
		   </div><!-- /.features -->
		   <div class="spacer">
			<p><?= substr("It is very necessary to find the best writer for you, our experts are very talented with capabilities in different subjects. We have vetted each of them meaning you can trust that they will deliver the highest standard of writing and on time too.", 0, 240) ?></p>
			<p><b>Over <?= $model->countCategoryJobs('4') ?> services</b></p>
		   </div> <!-- /.spacer -->
		  </a>		 
		 </div><!-- /.col-lg-4 -->
		 <div class="col-lg-4 col-md-4 col-sm-6">
		  <a href="<?= Url::to(['/site/job-category', 'id'=>19]) ?>" class="hover">
		   <div class="features five">
		    <span class="fa-stack fa-3x">
			 <i class="fa fa-circle fa-stack-2x"></i>
			 <i class="fa fa-code fa-stack-1x fa-inverse"></i>			
			</span><!-- /span -->
			<h4>Email Marketing</h4>
		   </div><!-- /.features -->
		   <div class="spacer">
			<p><?= substr("Building successful mail marketing is absolutely important, here is one of the reasons why! There is a lot of information bombarding out there, over time though mail remains our solitude place. When you go into someone’s inbox you are in their space and its important to go prepared with the best manner in your techniques’. What you want to accomplish with mail marketing, be it campaigns, Sales soliciting, brand enriching or build trust and customer loyalty we are here to ensure that success.", 0, 240) ?></p>
			<p><b>Over <?= $model->countCategoryJobs('19') ?> services</b></p>
		   </div> <!-- /.spacer -->
		  </a>		 
		 </div><!-- /.col-lg-4 -->
		 <div class="col-lg-4 col-md-4 col-sm-6">
		  <a href="<?= Url::to(['/site/job-category', 'id'=>9]) ?>">
		   <div class="features six">
		    <span class="fa-stack fa-3x">
			 <i class="fa fa-circle fa-stack-2x"></i>
			 <i class="fa fa-table fa-stack-1x fa-inverse"></i>			
			</span><!-- /span -->
			<h4>Others</h4>
		   </div><!-- /.features -->
		   <div class="spacer">
			<p><?= substr("We appreciate how much time has changed, because we get our work done the time we require it done.
All tasks that could overwhelm you any day! We are literally a mail away to promptly get it done.
Happy to serve.", 0, 240) ?></p>
			<p><b>Over <?= $model->countCategoryJobs('5') ?> services</b></p>
		   </div> <!-- /.spacer -->
		  </a>		 
		 </div><!-- /.col-lg-4 -->
		 <div class="col-lg-4 col-md-4 col-sm-6">
		  <a href="<?= Url::to(['/site/job-category', 'id'=>15]) ?>">
		   <div class="features seven">
		    <span class="fa-stack fa-3x">
			 <i class="fa fa-circle fa-stack-2x"></i>
			 <i class="fa fa-cogs fa-stack-1x fa-inverse"></i>			
			</span><!-- /span -->
			<h4>Content Writing and Blogging</h4>
		   </div><!-- /.features -->
		   <div class="spacer">
			<p><?= substr("Let it be known, let the world discover it. Our writers are creative, have excellent grammar, time conscious and very keen to give expected results and satisfy clients, ensuring they have expressed what the client wants to communicate.", 0, 100) ?></p>
			<p><b>Over <?= $model->countCategoryJobs('15') ?> services</b></p>
		   </div> <!-- /.spacer -->
		  </a>		 
		 </div><!-- /.col-lg-4 -->
		 
		 <div class="col-lg-4 col-md-4 col-sm-6">
		  <a href="<?= Url::to(['/site/job-category', 'id'=>11]) ?>">
		   <div class="features eight">
		    <span class="fa-stack fa-3x">
			 <i class="fa fa-circle fa-stack-2x"></i>
			 <i class="fa fa-eye fa-stack-1x fa-inverse"></i>			
			</span><!-- /span -->
			<h4>Social Media Marketing</h4>
		   </div><!-- /.features -->
		   <div class="spacer">
			<p><?= substr("Social media is impressionable and can get measurable rewards if you use tools that your business suits. We have internet obsessed skilled personnel, who will work with you towards your goal. ", 0, 110) ?></p>
				<p><b>Over <?= $model->countCategoryJobs('28') ?> services</b></p>
		   </div> <!-- /.spacer -->
		  </a>		 
		 </div><!-- /.col-lg-4 -->
		 </div><!-- /.col-lg-12 -->
		</div><!-- /.row -->

	  </div><!-- /.container -->
	 </section><!-- /section -->

     <!-- ==============================================
     Banner Section
     =============================================== -->
	 <section class="banner-comment">
	  <div class="container">
	   <h1>Best way to help world society is to develop a concrete framework for high paying jobs and individual skills enhancements.</h1>
	  </div><!-- /container -->
	 </section><!-- /section -->	  

     <!-- ==============================================
	 Stats Section
	 =============================================== -->	
	 <section id="stats" class="stats">
	  <div class="container text-center">
		
	   <div class="row">
				
		<div class="col-lg-3 col-sm-6 pro">
		 <h5>Clients</h5>
		 <h1><span class="number-animator" data-value="82" data-animation-duration="800">0</span></h1>
		  <div class="progress transparent progress-small no-radius">
		   <div class="progress-bar progress-bar-black animated-progress-bar" data-percentage="45%" ></div>
		  </div><!-- /.progress -->
		</div><!-- /.col-lg-3 -->
				
		<div class="col-lg-3 col-sm-6 pro">
		 <h5>Freelancers</h5>					
		 <h1><span class="number-animator" data-value="25" data-animation-duration="800">0</span></h1>
		  <div class="progress transparent progress-small no-radius">
		   <div class="progress-bar progress-bar-black animated-progress-bar " data-percentage="79%"></div>
		  </div><!-- /.progress -->
		</div><!-- /.col-lg-3 -->
				
		<div class="col-lg-3 col-sm-6 pro">
		 <h5>Jobs Completed</h5>
		 <h1><span class="number-animator" data-value="150" data-animation-duration="800">0</span></h1>
		  <div class="progress transparent progress-small no-radius">
		   <div class="progress-bar progress-bar-black animated-progress-bar" data-percentage="40%"></div>
		  </div><!-- /.progress -->
		</div><!-- /.col-lg-3 -->

	   	<div class="col-lg-3 col-sm-6 pro">
		 <h5>Payed To Freelancers</h5>
		 <h1><i class="fa fa-USD"></i><span class="number-animator" data-value="250k" data-animation-duration="800">0</span></h1>
		  <div class="progress transparent progress-small no-radius">
		   <div class="progress-bar progress-bar-black animated-progress-bar" data-percentage="85%"></div>
		  </div><!-- /.progress -->
		</div><!-- /.col-lg-3 -->
				
	   </div><!-- /.row -->
	  </div><!-- /.container -->
     </section><!-- /section -->
	  
     <!-- ==============================================
	 Testimonials Section
	 =============================================== -->	
     <div id="testimonials">
	  <div class="container">  
	   <div class="row">
	   
	   <h3>Testimonials</h3>
	   <hr class="mint">
	   
		<div class="testimonials-slider">
		 <ul class="slides">
          <li>
		   <p>The Upkazi , is a powerful medium of expression and design in which its communications offers an infinite variety of perception, interpretation and execution.
		   <span>Odongo,Kisumu</span></p>
		  </li>
		  <li>
           <p>I m wondering why I never contacted these guys sooner! Seriously, they all have commendable talent in their respective field and knocked my concept out of the ballpark. Thanks for an amazing experience!
		   <span>Maina, Nakuru</span></p>
		  </li>
		  <li>
		   <p>I m wondering why I never contacted these guys sooner! Seriously, they all have commendable talent in their respective field and knocked my concept out of the ballpark. Thanks for an amazing experience!
		   <span>Marina Mago,Nairobi</span></p>
		  </li>
         </ul><!-- /ul -->
		</div><!-- /.testimonials-slider -->
	   </div><!-- /.row -->
	  </div><!-- /.container -->
     </div>
     <!-- /section --> 