<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SkillSet */

$this->title = 'Update Skill Set: ' . $model->skill_id;
$this->params['breadcrumbs'][] = ['label' => 'Skill Sets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->skill_id, 'url' => ['view', 'id' => $model->skill_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="skill-set-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
