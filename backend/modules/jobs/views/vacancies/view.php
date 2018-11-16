<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Vacancies */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Vacancies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacancies-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->vcn_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->vcn_id], [
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
            'vcn_id',
            'ind_id',
            'title',
            'description:ntext',
            'location',
            'reference_number',
            'vacancy_number',
            'min_salary',
            'max_salary',
            'start_date',
            'end_date',
            'relocate',
            'driving_licence',
            'applied',
            'available_from',
            'status',
            'posting_date',
        ],
    ]) ?>

</div>
