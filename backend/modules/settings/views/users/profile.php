<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Countries;
use common\models\Counties;
use common\models\SubCounties;
use common\models\PostalCodes;

$this->title = $model->firstname.' '.$model->middlename.' '.$model->lastname;
$this->params['breadcrumbs'][] = ['label' => 'Settings', 'url' => ['/settings']];
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['/settings/users']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
<?php $form = ActiveForm::begin(['id' => 'form-update']); ?>
    <div class="col-md-8">
        <div class="card">
            <div class="header">
                <h4 class="title">Personal Information</h4>
            </div>
            <div class="content">            
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                        	<?= $form->field($model, 'Title')->textInput(['placeholder'=>'Title']) ?>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                        	<?= $form->field($model, 'lastname')->textInput(['placeholder'=>'Last Name']) ?>
                        </div>
                    </div>
                </div>
                <div class="row">                
                    <div class="col-md-6">
                        <div class="form-group">
                        	<?= $form->field($model, 'firstname')->textInput(['placeholder'=>'First Name']) ?>
                        </div>
                    </div>
                	<div class="col-md-6">
                        <div class="form-group">
                        	<?= $form->field($model, 'middlename')->textInput(['placeholder'=>'Middle Name']) ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                	<div class="col-md-3">
                        <div class="form-group">
                            <?= $form->field($model, 'date_of_birth')->textInput(['placeholder'=>'Date Of Birth', 'type'=>'date']) ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <?= $form->field($model, 'id_number')->textInput(['placeholder'=>'ID Number', 'type'=>'number']) ?>
                        </div>
                    </div>
                	<div class="col-md-3">
                        <div class="form-group">
                        	<?= $form->field($model, 'gender')->textInput(['placeholder'=>'Gender']) ?>
                        </div>
                    </div>                        
                    <div class="col-md-3">
                        <div class="form-group">
                            <?= $form->field($model, 'marital_status')->textInput(['placeholder'=>'Marital Status']) ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= $form->field($user, 'username')->textInput(['disabled'=>true]) ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        	<?= $form->field($user, 'email')->textInput(['disabled'=>true]) ?>
                        </div>
                    </div>  
                </div>
                <div class="row">                     
                    <div class="col-md-12">
                        <div class="form-group">
                            <?= $form->field($model, 'about')->textarea(['rows'=>5]) ?>
                            <?= Html::submitButton('Update Profile', ['class' => 'btn btn-info btn-fill pull-right', 'name' => 'update-button']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
	<?php ActiveForm::end(); ?>
    <div class="col-md-4">
        <div class="card card-user">
            <div class="image">
                <img src="theme/assets/img/full-screen-image-3.jpg" alt="..."/>
            </div>
            <div class="content">
                <div class="author">
                     <a href="#">
                    <img class="avatar border-gray" src="theme/assets/img/<?= $model->avator ?>" alt="..."/>

                      <h4 class="title"><?= $model->firstname.' '.$model->lastname?><br />
                         <small><?= $user->username ?></small>
                      </h4>
                    </a>
                </div>
                <p class="description text-center"><?= $model->about ?></p>
            </div>
            <hr>
            <div class="text-center">
                <button href="#" class="btn btn-social btn-simple btn-facebook"><i class="fa fa-facebook-square"></i></button>
                <a  href="https://twitter.com/share" target="_blank"><button class="btn btn-social btn-simple btn-twitter"><i class="fa fa-twitter"></i></button></a>
                <button href="#" class="btn btn-social btn-simple btn-google"><i class="fa fa-google-plus-square"></i></button>

            </div>
        </div>
    </div>
</div>