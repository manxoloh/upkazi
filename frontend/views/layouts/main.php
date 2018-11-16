<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\AppAsset;
use yii\base\Widget;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
<style>
/* Sticky Social Icons */
.sticky-container{ padding:0px; margin:0px; position:fixed; right:-130px;top:230px; width:210px; z-index: 1100;}
.sticky li{list-style-type:none;background-color:#fff;color:#efefef;height:43px;padding:0px;margin:0px 0px 1px 0px; -webkit-transition:all 0.25s ease-in-out;-moz-transition:all 0.25s ease-in-out;-o-transition:all 0.25s ease-in-out; transition:all 0.25s ease-in-out; cursor:pointer;}
.sticky li:hover{margin-left:-115px;}
.sticky li img{float:left;margin:5px 4px;margin-right:5px;}
.sticky li p{padding-top:5px;margin:0px;line-height:16px; font-size:11px;}
.sticky li p a{ text-decoration:none; color:#2C3539;}
.sticky li p a:hover{text-decoration:underline;}
/* Sticky Social Icons */
</style>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118037819-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-118037819-1');
</script>

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '1696811073915889'); 
fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1" 
src="https://www.facebook.com/tr?id=1696811073915889&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
</head>
<body  class="greybg">
<?php $this->beginBody() ?>

<!-- ==============================================
	 Navbar
	 =============================================== -->
 <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
   <!-- Brand and toggle get grouped for better mobile display -->
   <a class="navbar-brand" href="<?= Url::to(['/']) ?>"><i class="fa fa-coffee"></i> Upkazi</a>
   <input type="checkbox" id="toggle" />
   <label for="toggle" class="toggle"></label>

   <!-- Collect the nav links, forms, and other content for toggling -->
	<ul class="menu">
	 <li><a href="<?= Url::to(['/'])?>">Home</a></li>
	 <li><a href="<?= Url::to(['/site/about'])?>">About</a></li>
	 <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Jobs <b class="caret"></b></a>
	  <ul class="dropdown-menu">
	   <li><a href="<?= Url::to(['/site/jobs'])?>">Find Jobs</a></li>
	   <li><a href="<?= Url::to(['/projects/create'])?>">Post Jobs</a></li>
	  </ul>
	 </li>  
   	 <li><a href="<?= Url::to(['/site/freelancers'])?>">Freelancers</a></li>
   	 <li><a href="<?= Url::to(['/site/how'])?>">How it works</a></li>
	 <?php
	   if (!Yii::$app->user->isGuest) { ?>
	   	<li><a href="<?= Url::to(['/projects'])?>">Projects</a></li>
	   	<li><a href="<?= Url::to(['/messages'])?>">Messages</a></li>
	   	<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">	   
    		<?php                         
                //Displays the name of the current user
                $username = Yii::$app->user->identity->username;
                $capfistletter = ucfirst(strtolower($username));
                echo $capfistletter;
             ?> 
         <b class="caret"></b>
         </a>
       <ul class="dropdown-menu">
    	   <li><a href="<?= Url::to(['/site/profile', 'id'=> Yii::$app->user->identity->id])?>"><i class="fa fa-user"></i> Profile</a></li>
    	   <li><a href="<?= Url::to(['/user-profile/create']) ?>"><i class="fa fa-gear"></i> Settings</a></li>
    	   <li><a href="<?= Url::to(['/site/logout'])?>" data-method="post"><i class="fa fa-lock"></i> Logout</a></li>
	  </ul>
         </li>
         
     <?php } else { ?>
	 	<li><a href="<?= Url::to(['/site/register'])?>">Register</a></li>
    	<li><a href="<?= Url::to(['/site/login'])?>">Login</a></li>
     <?php } ?>
	</ul><!-- /.ul.menu -->
  </div><!-- /.container -->
 </nav><!-- /.nav -->
    <?= $content ?>

<!-- ==============================================
	 Footer Section
	 =============================================== -->
     <div class="footer">
	  <div class="container">
	   <div class="row">
	  
	    <div class="col-md-4 col-sm-6 text-left">
	     <h4 class="heading no-margin">About Us</h4>
		 <hr class="mint">
		 <p>Upkazi.  is the Ultimate Freelance Marketplace  for employers and freelancers to connect, collaborate, and get work done.</p>
		 <p>We work hard to build a great product that is beautifully designed, simple to use, user friendly with great focus on user experience and customer service.</p>
	    </div><!-- /.col-md-4 -->
	   
	    <div class="col-md-2 col-sm-6 text-left">
	     <h4 class="heading no-margin">Company</h4>
		 <hr class="mint">
		 <div class ="no-padding">
		  <a href="<?= Url::to(['/'])?>">Home</a>
		  <a href="<?= Url::to(['/site/about'])?>">About</a>
		  <a href="<?= Url::to(['/site/jobs'])?>">Jobs</a>
		  <a href="<?= Url::to(['/site/freelancers'])?>">Freelancers</a>
		  <a href="<?= Url::to(['/site/how'])?>">How it works</a>
		  <a href="<?= Url::to(['/site/contact'])?>">Contact</a>		 
		 </div>
	    </div><!-- /.col-md-2 -->	
		
		<div class="col-md-3 col-sm-6 text-left">
	     <h4 class="heading no-margin">Other Services</h4>
		 <hr class="mint">
		 <div class="no-padding">
		  <a href="<?= Url::to(['/site/privacy'])?>">Privacy Policy</a>
		  <a href="<?= Url::to(['/site/terms'])?>">Terms of Use</a>
		  <a href="<?= Url::to(['/site/faq'])?>">FAQ</a>		 
		 </div>
	    </div><!-- /.col-md-3 -->	
		
	    <div class="col-md-3 col-sm-6 text-left">
	    <h4 class="heading no-margin">Browse</h4>
		<hr class="mint">
		 <div class="no-padding">
		   <a href="<?= Url::to(['/site/freelancers'])?>">Top Freelancers in Kenya</a>		  
		  </div>
		 </div><!-- /.col-md-3 -->
		 
	    </div><!-- /.row -->
	   <div class="clearfix"></div>
	  </div><!-- /.container-->
     </div><!-- /.footer -->			
	 
	 <!-- ==============================================
	 Made Section
	 =============================================== -->
	 <section class="made">
	  <div class="container">
	   <div class="row">
		<div class="col-lg-10 col-lg-offset-1 text-center">
		 <h4 class="made-with-love">Upkazi Marketplace </h4>
		 <p class="made-with-love-1">Handcrafted with <i class="fa fa-heart"></i> &amp; Much <i class="fa fa-coffee"></i> In Nairobi, Kenya.</p>
		</div>
		<!-- /.col-lg-10 -->
	   </div><!-- /.row -->
	  </div><!-- /.container -->
     </section><!-- /.made -->
	    
<!-- ==============================================
	 Bottom Footer Section
	 =============================================== -->	
     <footer id="main-footer" class="main-footer">
	  <div class="container">
	   <div class="row">
	   
	    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		 <ul class="social-links">
		  <li class="revealOnScroll" data-animation="slideInLeft" data-timeout="800"><a href="https://www.facebook.com/upkazi/" target="_blank"><i class="fa fa-facebook fa-fw"></i></a></li>
		  <li class="revealOnScroll" data-animation="slideInLeft" data-timeout="600"><a href="#link"><i class="fa fa-twitter fa-fw"></i></a></li>
		  <li class="revealOnScroll" data-animation="slideInLeft" data-timeout="400"><a href="https://plus.google.com/114054193774451452046" target="_blank"><i class="fa fa-google-plus fa-fw"></i></a></li>
		  <li class="revealOnScroll" data-animation="slideInLeft" data-timeout="200"><a href="#link"><i class="fa fa-pinterest fa-fw"></i></a></li>
		  <li class="revealOnScroll" data-animation="slideInLeft"><a href="#link"><i class="fa fa-linkedin fa-fw"></i></a></li>
		 </ul>
		</div>
	    <!-- /.col-sm-4 -->
		
		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 revealOnScroll" data-animation="bounceIn" data-timeout="200">
		 <div class="img-responsive text-center">
		  <i class="fa fa-coffee logo"></i>		 </div><!-- End image-->
		</div>
		<!-- /.col-sm-4 -->
		
		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-right revealOnScroll" data-animation="slideInRight" data-timeout="200">
		 <p>All Rights Reserved. &copy; <a href="<?= Url::to(['/']) ?>" target="_blank"> Upkazi</a> <?= date("Y"); ?></p>
		</div>
		<!-- /.col-sm-4 -->
				
	   </div><!-- /.row -->
	  </div><!-- /.container -->
	 </footer><!-- /.footer -->  
	 <div class="sticky-container">
	 	<ul class="sticky">
			<li>
    			<a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2FUPKAZI.COM%2F&amp;src=sdkpreparse" target="_blank">
    				<img src="<?= Yii::getAlias('@web')?>/img/social-media/facebook-circle.png" width="32" height="32" data-href="http://UPKAZI.COM" data-layout="button_count" data-size="large" data-mobile-iframe="true">
    				<p>Share on<br>Facebook</p>
    			</a>
			</li>
			<li>
				<a href="https://twitter.com/share" target="_blank">
    				<img src="<?= Yii::getAlias('@web')?>/img/social-media/twitter-circle.png" width="32" height="32">
    				<p>Share on<br>Twitter</p>
				</a>
			</li>
			<li>
    			<a href="https://plus.google.com target="_blank">
    				<img src="<?= Yii::getAlias('@web')?>/img/social-media/gplus-circle.png" width="32" height="32">
    				<p>Follow Us on<br>Google+</p>
				</a>
			</li>
			<li>
				<a href="https://www.linkedin.com/shareArticle?mini=true&url=http://upkazi.com&title=Upkazi Freelance Marketplace
                    &summary=We are a market place for employers and freelancers to connect, collaborate and get work done. Our esteemed clients from all walks 
                    of life teachers, leaners, researchers, startups and big organizations can rely on our channel to get work done. We have no geographical 
                    limitation talent and best skills are available to you. Upkazi is beautifully designed, its simple to use and we are keen on customer 
                    service and experience. We are here to help.&source=Upkazi" target="_blank">
    				<img src="<?= Yii::getAlias('@web')?>/img/social-media/linkedin-circle.png" width="32" height="32">
    				<p>Share on<br>LinkedIn</p>
				</a>
			</li>
			<li>
				<a href="https://www.youtube.com/channel/UCKTYkXFwAGNnbnWAig1lezg" target="_blank">
    				<img src="<?= Yii::getAlias('@web')?>/img/social-media/youtube-circle.png" width="32" height="32">
    				<p>Subscribe on<br>YouYube</p>
				</a>
			</li>
			<li>
				<a href="https://www.pinterest.com" target="_blank">
    				<img src="<?= Yii::getAlias('@web')?>/img/social-media/pin-circle.png" width="32" height="32">
    				<p>Follow Us on<br>Pinterest</p>
				</a>
			</li>
		</ul>
	</div>
     <a id="scrollup">Scroll</a>
<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
(function(){ var widget_id = 'Nfleh7s7je';var d=document;var w=window;function l(){
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
<!-- {/literal} END JIVOSITE CODE -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
