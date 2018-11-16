<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ProjectSkills */

$this->title = 'Create Project Skills';
$this->params['breadcrumbs'][] = ['label' => 'Project Skills', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-skills-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
