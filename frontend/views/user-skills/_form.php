<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\Categories;
use common\models\SkillSet;

/* @var $this yii\web\View */
/* @var $model common\models\UserSkills */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-skills-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'skill_id')->checkboxList(ArrayHelper::map(SkillSet::find()->all(), 'skill_id', 'skill_name'))->label(false); ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Add Skills' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
