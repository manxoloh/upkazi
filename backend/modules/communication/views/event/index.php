<?php
use yii\helpers\Url;
use common\models\User;

$this->title = 'Events';
$this->params['breadcrumbs'][] = [
    'label' => 'Communication',
    'url' => [
        '/communication'
    ]
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="header">
				<button class="btn btn-success btn-xs btn-fill">Holiday</button>
				<button class="btn btn-warning btn-xs btn-fill">Luncheon</button>
				<button class="btn btn-danger btn-xs btn-fill">Holiday</button>
				<button class="btn btn-primary btn-xs btn-fill">Holiday</button>
				<button class="btn btn-info btn-xs btn-fill">Holiday</button>
			</div>
			<div class="content">  
  				<?=\yii2fullcalendar\yii2fullcalendar::widget(array('events' => $events));?>
  			</div>
		</div>
	</div>
</div>
