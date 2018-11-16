<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Vacancies */

$this->title = 'Create Vacancies';
$this->params['breadcrumbs'][] = ['label' => 'Vacancies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacancies-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
