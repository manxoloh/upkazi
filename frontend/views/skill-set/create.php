<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SkillSet */

$this->title = 'Create Skill Set';
$this->params['breadcrumbs'][] = ['label' => 'Skill Sets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="skill-set-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
