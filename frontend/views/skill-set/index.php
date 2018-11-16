<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SkillSetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Skill Sets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="skill-set-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Skill Set', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'skill_id',
            'skill_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
