<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\SkillSet */

$this->title = $model->skill_id;
$this->params['breadcrumbs'][] = ['label' => 'Skill Sets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="skill-set-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->skill_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->skill_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'skill_id',
            'skill_name',
        ],
    ]) ?>

</div>
