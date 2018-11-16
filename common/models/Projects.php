<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "projects".
 *
 * @property integer $id
 * @property integer $cat_id
 * @property integer $client_id
 * @property string $project_name
 * @property string $project_description
 * @property string $responsibilities
 * @property string $requirements
 * @property double $budget
 * @property string $location
 * @property string $document
 * @property string $reference_token
 * @property string $pesapal_traking_id
 * @property string $payment_method
 * @property string $payment_status
 * @property string $status
 * @property string $expected_start_date
 * @property string $expected_delivery_date
 * @property string $date_posted
 *
 * @property Applications[] $applications
 * @property ProjectSkills[] $projectSkills
 * @property Categories $cat
 * @property User $client
 */
class Projects extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $globalSearch;
    public static function tableName()
    {
        return 'projects';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_id', 'client_id', 'project_name', 'project_description', 'budget', 'expected_start_date', 'expected_delivery_date'], 'required'],
            [['cat_id', 'client_id'], 'integer'],
            [['project_description', 'responsibilities', 'requirements'], 'string'],
            [['budget'], 'number'],
            [['expected_start_date', 'expected_delivery_date', 'date_posted', 'globalSearch'], 'safe'],
            ['expected_delivery_date', 'compare', 'compareAttribute' => 'expected_start_date', 'operator' => '>='],
            [['project_name', 'location', 'document', 'reference_token', 'pesapal_traking_id', 'payment_method', 'payment_status', 'status'], 'string', 'max' => 255],
            [['cat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['cat_id' => 'id']],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['client_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cat_id' => 'Project Category',
            'client_id' => 'Client Name',
            'project_name' => 'Project Name',
            'project_description' => 'Project Description',
            'responsibilities' => 'Responsibilities',
            'requirements' => 'Requirements',
            'budget' => 'Budget',
            'location' => 'Location',
            'document' => 'Document',
            'reference_token' => 'Reference Token',
            'pesapal_traking_id' => 'Pesapal Traking ID',
            'payment_method' => 'Payment Method',
            'payment_status' => 'Payment Status',
            'status' => 'Status',
            'expected_start_date' => 'Expected Start Date',
            'expected_delivery_date' => 'Expected Delivery Date',
            'date_posted' => 'Date Posted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApplications()
    {
        return $this->hasMany(Applications::className(), ['project_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectSkills()
    {
        return $this->hasMany(ProjectSkills::className(), ['project_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCat()
    {
        return $this->hasOne(Categories::className(), ['id' => 'cat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(User::className(), ['id' => 'client_id']);
    }
    
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function countCategoryJobs($id)
    {
        
        return $this->find()->where(['cat_id'=>$id])->count();
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function countAllJobs()
    {
        
        return $this->find()->count();
    }
    
    public static function timeElapsed($time){
        $time = time() - $time;
        $time = ($time < 1) ? 1 : $time;
        
        $tokens = [
            '31536000'=>'year',
            '2592000'=>'month',
            '604800'=>'week',
            '86400'=>'day',
            '3600'=>'hour',
            '60'=>'minute',
            '1'=>'second',
        ];
        foreach ($tokens as $unit=>$text){
            if ($time < $unit) continue;
            $numberOdUnits = floor($time / $unit);
            return $numberOdUnits.' '.ucfirst($text).(($numberOdUnits>1)?'s Ago':' Ago');
        }
        
    }
    
    public static function getBudgetCount($min, $max)
    {
        $model = new Projects();
        return $model->find()->where(['between', 'budget', $min, $max])->count();

    }
    /**
     * @desc currency converter method
     */
    public function convertCurrency($from, $to, $amount){
//         // create curl resource
//         $ch = curl_init(); 
//         // set url
//         curl_setopt($ch, CURLOPT_URL, "https://free.currencyconverterapi.com/api/v5/convert?q={$from}_{$to}&compact=ultra");
        
//         //return the transfer as a string
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        
//         // $output contains the output string
//         $output = curl_exec($ch);
//         // close curl resource to free up system resources
//         curl_close($ch);
//         $data = explode(':', $output);
//         $data = explode(" ", $data[1]);
//         $rate = round($data[0], 8);
//         $total = $rate * $amount;
//         return $total;
        $api_key = "Yyb4EhUGFDj2dSf28yVeYEJHyTABja";
        $url = "https://www.amdoren.com/api/currency.php?api_key=$api_key&from=$from&to=$to";
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $json_string = curl_exec($ch);
        $parsed_json = json_decode($json_string);
        $error = $parsed_json->error;
        $error_message = $parsed_json->error_message;
        $rate = 100.72; //$parsed_json->amount;
        return $rate*$amount;
    }
}
