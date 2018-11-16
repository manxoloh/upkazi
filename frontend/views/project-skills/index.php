<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProjectSkillsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Project Skills';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-skills-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Project Skills', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'project_id',
            'skill_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
