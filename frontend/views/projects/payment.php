<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\Categories;

/* @var $this yii\web\View */
/* @var $model common\models\Projects */
/* @var $form yii\widgets\ActiveForm */
?>

<!-- ==============================================
	 Header
	 =============================================== -->	 
     <header class="header-jobs">
      <div class="container">
	   <div class="content">
	    
       </div><!-- /.content -->
	  </div><!-- /.container -->
     </header><!-- /header -->
	 
     <!-- ==============================================
	 Jobs Section
	 =============================================== -->
<section class="jobslist">
	  <div class="container-fluid">
	   <div class="row-fluid">
	   
	    <div class="col-lg-2">
		</div><!-- /.col-lg-2 -->
	    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 white">
	    
		<h1><?= Html::encode($this->title) ?></h1>
		  <div class="job">	
		  <div class="row top-sec">
		   <div class="col-lg-12">		   
			<div class="col-lg-12 col-xs-12">
        
            <?php $form = ActiveForm::begin(); ?>
            <div class="form-body">
                	<?= $form->field($model, 'cat_id')->dropDownList(ArrayHelper::map(Categories::find()->all(), 'id', 'name'), ['prompt'=>'-- Select Project Category --']) ?>
            
                	<?= $form->field($model, 'project_name')->textInput(['maxlength' => true]) ?>
                
                	<?= $form->field($model, 'budget')->textInput(['readonly'=>true])->hint('1 US Dollar = '.$model->convertCurrency("USD", "KES", 1).' Kenyan Shilling') ?>
                
                	<?= $form->field($client, 'phone')->textInput() ?>
                	
                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Make Payment' : 'Confirm Payment', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
        	</div>
            <?php ActiveForm::end(); ?>
			
		    </div><!-- /.col-lg-12 -->
		   </div><!-- /.row -->
		  </div>
		 </div>
	    </div><!-- /.col-lg-8 -->
	   </div><!-- /.row -->
	  </div><!-- /.container-fluid -->
     </section><!-- /section --> 
     <br><br>