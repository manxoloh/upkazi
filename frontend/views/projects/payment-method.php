<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use common\models\PaymentMethod;
use common\models\Projects;

$this->title = 'Payment Method';
$this->params['breadcrumbs'][] = $this->title;
if($budget > 70000){
    $methods = ArrayHelper::map(PaymentMethod::find()->where(['!=', 'method_type', 'MPESA'])->andWhere(['!=', 'method_type', 'AIRTEL MONEY'])->all(), 'method_type', 'method_type');
}
else {
    $methods = ArrayHelper::map(PaymentMethod::find()->all(), 'method_type', 'method_type');
}

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
	  <div class="container">
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
			<div id="paypal-button-container"></div>
			<br>			
			<?= $form->field ($model, 'method_type')->inline()->radioList($methods)->label (false)->hint('<p style="color: red">MPESA Payments can only be used for transactions less than KSh. 70,000 </p> <p style="color: blue"><b>Your Bill is KSh '. Yii::$app->formatter->asInteger($budget) .' (USD '. $usd .') </b></p>') ?>
			<?= Html::submitButton('Proceed', ['class' => 'btn btn-success', 'name' => 'login-button']) ?>

			<?php ActiveForm::end(); ?>	
			<br><br>		
		    </div><!-- /.col-lg-12 -->
		   </div><!-- /.row -->
		  </div>
		 </div>
	    </div><!-- /.col-lg-8 -->
	   </div><!-- /.row -->
	  </div><!-- /.container-fluid -->
     </section><!-- /section --> 
     <br><br>
     
     
<script src="https://www.paypalobjects.com/api/checkout.js"></script>

<script>

    // Render the PayPal button

    paypal.Button.render({

        // Set your environment

        env: 'sandbox', // sandbox | production

        // Specify the style of the button

        style: {
            label: 'paypal',
            size:  'large',    // small | medium | large | responsive
            shape: 'pill',     // pill | rect
            color: 'gold',     // gold | blue | silver | black
            tagline: false    
        },

        // PayPal Client IDs - replace with your own
        // Create a PayPal app: https://developer.paypal.com/developer/applications/create

        client: {
            sandbox:    'AdqS5Z54E8ZocmLP0CVKKlKdHL7IgUcb-AmEqx4Zq8M0OcekKMFDDx0piMOUaVOllSMT5tggW3NgFMHV',
            production: 'AZrg-Tbrp3UAx-rVPRuSN0DKgsVUJhDub1sy0RurfwDdK3SNwrE8KwMdvQ0Wj6QRyhkp6xvUp40QObFM'
        },
        payment: function(data, actions) {
            return actions.payment.create({
                payment: {
                    transactions: [
                        {
                            amount: { total: '<?= round((new Projects())->convertCurrency("KES", "USD", $budget)) ?>', currency: 'USD' }
                        }
                    ]
                }
            });
        },

        onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function() {
                window.alert('Payment Complete!');
            });
        }

    }, '#paypal-button-container');

</script>
    