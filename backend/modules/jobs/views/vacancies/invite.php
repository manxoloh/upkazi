<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\admin\models\UniPanel;
use yii\jui\DatePicker;
use common\models\Panels;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Vacancy */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
<div class="col-sm-12 col-xs-12">
<?php $form = ActiveForm::begin(); ?>
<div class="panel">
<div class="panel-body">
    <?= $form->field($model, 'pnl_id')->dropDownList(ArrayHelper::map(Panels::find()->orderBy('panel_name')->all(), 'pnl_id', 'panel_name')) ?>

    <?= $form->field($model, 'venue')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'interview_date')->textInput(['placeholder'=>'Date Of Interview', 'type'=>'date'])?>
    <?= $form->field($status, 'stt_id')->hiddenInput(['value'=>5])->label(false) ?>



<div class="form-group">
<?= Html::submitButton($model->isNewRecord ? 'Invite for Interview' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>
</div>

<?php ActiveForm::end(); ?>

</div>
</div>
</div>
