<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use backend\assets\AppAsset;
use yii\helpers\Url;
use odaialali\yii2toastr\ToastrFlash;
use yii\widgets\Breadcrumbs;


AppAsset::register($this);
$this->registerJs("
            var goLockScreen = false;
            var stop = false;
            var autoLockTimer;
            window.onload = resetTimer;
            window.onmousemove = resetTimer;
            window.onmousedown = resetTimer; // catches touchscreen presses
            window.onclick = resetTimer;     // catches touchpad clicks
            window.onscroll = resetTimer;    // catches scrolling with arrow keys
            window.onkeypress = resetTimer;
    
            function lockScreen() {
                stop = true;
                window.location.href = '".\yii\helpers\Url::toRoute(['/site/lock-screen'])."&previous='+encodeURIComponent(window.location.href);
            }
    
            function lockIdentity(){
                goLockScreen = true;
            }
    
            function resetTimer() {
                if(stop==true){
    
                }
                else if (goLockScreen) {
                    lockScreen();
                }
                else{
                    clearTimeout(autoLockTimer);
                    autoLockTimer = setTimeout(lockIdentity, 1000*15*60);  // time is in milliseconds
                }
    
            }
        ");
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<meta charset="<?= Yii::$app->charset ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="theme/assets/img/favicon.ico">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>



<body>

	<div class="wrapper">
	<nav class="navbar navbar-default navbar-fixed">
				<div class="container-fluid">
					<div class="navbar-minimize">
						<button id="minimizeSidebar"
							class="btn btn-warning btn-fill btn-round btn-icon">
							<i class="fa fa-ellipsis-v visible-on-sidebar-regular"></i> <i
								class="fa fa-navicon visible-on-sidebar-mini"></i>
						</button>
					</div>
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse">
							<span class="sr-only">Toggle navigation</span> <span
								class="icon-bar"></span> <span class="icon-bar"></span> <span
								class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">Upkazi</a>
					</div>
					<div class="collapse navbar-collapse">

						<form class="navbar-form navbar-left navbar-search-form"
							role="search">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-search"></i></span>
								<input type="text" value="" class="form-control"
									placeholder="Search...">
							</div>
						</form>

						<ul class="nav navbar-nav navbar-right">
							
								<li class="dropdown"><a href="#" class="dropdown-toggle"
								data-toggle="dropdown"> <i class="fa fa-bell-o"></i> <span
									class="notification">5</span>
									<p class="hidden-md hidden-lg">
										Notifications <b class="caret"></b>
									</p>
							</a>
								<ul class="dropdown-menu">
									<li><a href="#">You have 0 Notification</a></li>
								</ul></li>
								<li class="dropdown"><a href="#" class="dropdown-toggle"
								data-toggle="dropdown"> <i class="fa fa-envelope-o"></i> <span
									class="message">5</span>
									<p class="hidden-md hidden-lg">
										Messages <b class="caret"></b>
									</p>
							</a>
								<ul class="dropdown-menu">
									<li><a href="#">You have 0 Messages</a></li>
								</ul></li>
								<li class="dropdown"><a href="#" class="dropdown-toggle"
								data-toggle="dropdown"> <i class="fa fa-cog"></i> <span
									class="settings">0</span>
									<p class="hidden-md hidden-lg">
										Settings <b class="caret"></b>
									</p>
							</a>
								<ul class="dropdown-menu">
									<li><a href="#">You have 0 Messages</a></li>
								</ul></li>

							<li class="dropdown dropdown-with-icons"><a href="#"
								class="dropdown-toggle" data-toggle="dropdown"> <i
									class="fa fa-list"></i>
									<p class="hidden-md hidden-lg">
										More <b class="caret"></b>
									</p>
							</a>
								<ul class="dropdown-menu dropdown-with-icons">
									<li><a href="<?= Url::to(['/communication'])?>"> <i class="pe-7s-mail"></i> Messages
									</a></li>
									<li><a href="<?= Url::to(['/site/contact'])?>"> <i
											class="pe-7s-help1"></i> Help Center
									</a></li>
									<li><a href="<?= Url::to(['/settings/configurations/create'])?>" class="popup"> <i class="pe-7s-tools"></i> Settings
									</a></li>
									<li class="divider"></li>
									<li><a href="<?= Url::to(['/site/lock-screen', 'previous'=>Url::current()])?>"> <i class="pe-7s-lock"></i> Lock Screen
									</a></li>
									<li><a href="<?= Url::to(['/site/logout'])?>"
										data-method="post" class="text-danger"> <i
											class="pe-7s-close-circle"></i> Log out
									</a></li>
								</ul></li>

						</ul>
					</div>
				</div>
			</nav>
		<div class="sidebar" data-color="orange"
			data-image="theme/assets/img/full-screen-image-3.jpg">
			<!--

            Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
            Tip 2: you can also add an image using data-image tag

        -->

			<div class="logo">
				<a href="<?= Url::to(['/'])?>" class="logo-text"> Upkazi </a>
			</div>
			<div class="logo logo-mini">
				<a href="<?= Url::to(['/'])?>" class="logo-text"> UP </a>
			</div>

			<div class="sidebar-wrapper">
				<div class="user">
					<div class="photo">
						<img src="theme/assets/img/default-avatar.png" />
					</div>
					<div class="info">
						<a data-toggle="collapse" href="#collapseExample"
							class="collapsed"> <?php 
							if (!Yii::$app->user->isGuest) {
							    echo Yii::$app->user->identity->username;
							}
							?> <b class="caret"></b>
						</a>
						<div class="collapse" id="collapseExample">
							<ul class="nav">
								<li><a href="<?= Url::to(['/settings/users/profile', 'id'=>Yii::$app->user->identity->id])?>">My Profile</a></li>
								<li><a href="#">Settings</a></li>
							</ul>
						</div>
					</div>
				</div>

				<ul class="nav">
					<li class="active"><a href="<?= Url::to(['/']) ?>"> <i class="pe-7s-graph"></i>
							<p>Dashboard</p>
					</a></li>
					<li><a href="<?= Url::to(['/settings/users']) ?>"> <i class="pe-7s-users"></i>
							<p>Users</p>
					</a></li>
					<li><a href="<?= Url::to(['/jobs']) ?>"> <i class="pe-7s-portfolio"></i>
							<p>Jobs</p>
					</a></li>
					<li><a href="<?= Url::to(['/']) ?>"> <i class="pe-7s-graph3"></i>
							<p>Reports</p>
					</a></li>
					<li><a href="<?= Url::to(['/communication']) ?>"> <i class="pe-7s-chat"></i>
							<p>Messages</p>
					</a></li>
					<li><a href="#"> <i class="pe-7s-bell"></i>
							<p>Notifications</p>
					</a></li>
					<li><a href="<?= Url::to(['/communication/event'])?>"> <i class="pe-7s-date"></i>
							<p>Calendar</p>
					</a></li>

					<li><a data-toggle="collapse" href="#pagesExamples"> <i
							class="pe-7s-tools"></i>
							<p>Settings <b class="caret"></b></p>
					</a>
						<div class="collapse" id="pagesExamples">
							<ul class="nav">
								<li><a href="<?= Url::to(['/rbac'])?>">Access Control</a></li>
								<li><a href="<?= Url::to(['/site/icons'])?>">Icons</a></li>
							</ul>
						</div></li>
				</ul>
			</div>
		</div>

		<div class="main-panel">			
			<div class="content">
				<div class="container-fluid">
					<nav aria-label="breadcrumb" role="navigation">
                        <?= Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]) ?>
                    </nav>
            		<?= $content ?>                    
                    <?= ToastrFlash::widget([
                        'options' => [
                            'title' => 'Toast Notifications',
                            "closeButton" => true,
                            "debug" => false,
                            "newestOnTop" => false,
                            "progressBar" => false,
                            "positionClass" => 'toast-bottom-right',
                            "preventDuplicates" => false,
                            "onclick" => null,
                            "showDuration" => "1000",
                            "hideDuration" => "1000",
                            "timeOut" => "5000",
                            "extendedTimeOut" => "1000",
                            "showEasing" => "swing",
                            "hideEasing" => "linear",
                            "showMethod" => "fadeIn",
                            "hideMethod" => "fadeOut"
                        ]
                    ]);?>
            	</div>
			</div>


			<footer class="footer">
				<div class="container-fluid">
					<p class="copyright pull-right">
                    &copy; <?= date('Y')?> <a
							href="https://www.upkazi.com/">Upkazi</a>
						All Rights Reserved
					</p>
				</div>
			</footer>

		</div>
	</div>
	<div class="modal fade" id="Modal">
    <div class="modal-dialog">
        <div class="modal-lg">
            <div class="modal-content">
                <div class="modal-body"></div>
            </div>
        </div>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>