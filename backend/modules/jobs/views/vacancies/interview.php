<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\UniRating */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Panel Interview';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <section class="panel">
            <div class="panel-body">
                <div class="col-lg-3">
                    <section class="panel">
                        <div class="panel-body">
                            <strong>Name: </strong>Solomon Maithya</div>
                    </section>
                </div>
                <div class="col-lg-3">
                    <section class="panel">
                        <div class="panel-body">
                            <strong>Interview Date: <?= date("Y-m-d")?></strong></div>
                    </section>
                </div>
                <div class="col-lg-3">
                    <section class="panel">
                        <div class="panel-body">
                            <strong>Position Applied For: </strong>Title</div>
                    </section>
                </div>
                <div class="col-lg-3">
                    <section class="panel">
                        <div class="panel-body">
                            <strong>Interviewers: </strong>Interviewers</div>
                    </section>
                </div>
            </div>
        </section>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <?php
                    $form = ActiveForm::begin();

                    $i = 0;
                    foreach ((array)$categories as $cat){
                        $i++;
                        if ($cat['rct_id']==$i){
                            echo '
                    <thead><tr><td><b>'.$cat['description'].'</b></td>';
                            foreach ((array)$scales as $scale){

                                echo '<td><b>'.$scale['description'].'</b></td>';
                            }

                            echo '</tr></thead>';

                            foreach ((array)$question as $quest) {
                                if ($quest['rct_id']==$i){
                                    echo '<tr><td>'
                                    				.$quest['question'].
                                    				$form->field($model, 'scl_id')->hiddenInput(['value'=>$scale['scl_id']])->label(false).
                                    				$form->field($model, 'qst_id')->Input(['value'=>$quest['qst_id']])->label(false).
                                    		'</td>';
                                    $list = [0 => 'Excallent', 1 => 'Good', 2 => 'Poor'];
                                    echo '<td>'.$form->field($model, 'rate')->radioList($list).'</td>';
                                    
                                    echo '</tr><tr><td colspan="5"></td></tr>';
                                }
                            }
                        }
                    }


                    ?>
                </table>
                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    <?php
                    ActiveForm::end();
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
