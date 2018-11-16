<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ApplicationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Applications';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="applications-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Applications', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'applicant_id',
            'client_id',
            'project_id',
            'cover_letter:ntext',
            // 'resume:ntext',
            // 'service_fee',
            // 'freelancer_earn',
            // 'award_status',
            // 'completion_status',
            // 'freelancer_payment_status',
            // 'application_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
