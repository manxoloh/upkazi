<?php

namespace common\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "applications".
 *
 * @property integer $id
 * @property integer $applicant_id
 * @property integer $client_id
 * @property integer $project_id
 * @property string $cover_letter
 * @property string $resume
 * @property double $service_fee
 * @property double $freelancer_earn
 * @property string $award_status
 * @property string $completion_status
 * @property string $freelancer_payment_status
 * @property string $application_date
 *
 * @property User $applicant
 * @property User $client
 * @property Projects $project
 */
class Applications extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'applications';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['applicant_id', 'client_id', 'project_id', 'cover_letter', 'resume', 'service_fee', 'freelancer_earn'], 'required'],
            [['applicant_id', 'client_id', 'project_id'], 'integer'],
            [['cover_letter', 'resume'], 'string'],
            [['service_fee', 'freelancer_earn'], 'number'],
            [['application_date'], 'safe'],
            [['award_status', 'completion_status', 'freelancer_payment_status'], 'string', 'max' => 255],
            [['applicant_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['applicant_id' => 'id']],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['client_id' => 'id']],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Projects::className(), 'targetAttribute' => ['project_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'applicant_id' => 'Applicant ID',
            'client_id' => 'Client ID',
            'project_id' => 'Project ID',
            'cover_letter' => 'Cover Letter',
            'resume' => 'Resume',
            'service_fee' => 'Service Fee',
            'freelancer_earn' => 'Freelancer Earn',
            'award_status' => 'Award Status',
            'completion_status' => 'Completion Status',
            'freelancer_payment_status' => 'Freelancer Payment Status',
            'application_date' => 'Application Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApplicant()
    {
        return $this->hasOne(User::className(), ['id' => 'applicant_id']);
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
    public function getProject()
    {
        return $this->hasOne(Projects::className(), ['id' => 'project_id']);
    }
    
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public static function countProjectApplications($id)
    {
        $query = new Query();
        $result = $query->select(['applications'])->from(['applications'])->where(['project_id'=>$id])->count();
        
        return $result;
    }
    
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public static function getProjectApplications($id)
    {
        $query = new Query();
        $record = $query->select(['applications.*','applications.id as app_id', 'user_profile.*'])
        ->from('applications') ->innerJoin('user_profile', 'user_profile.user_id = applications.applicant_id')
        ->where(['applications.project_id'=>$id]);
        
        return $record;
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public static function freelancerEarnings($id)
    {
        $query = new Query();
        $record = $query->select(['applications.freelancer_earn'])
        ->from('applications')
        ->where(['applications.applicant_id'=>$id, 'freelancer_payment_status'=>'PAID'])->sum('freelancer_earn');
        
        return $record;
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public static function completedJobs($id)
    {
        $query = new Query();
        $record = $query->select(['applications.freelancer_earn'])
        ->from('applications')
        ->where(['applications.applicant_id'=>$id, 'freelancer_payment_status'=>'PAID'])->sum('freelancer_earn');
        
        return $record;
    }
    
    public static function getAppliedJobs($id)
    {
        $query = new Query();
        $result = $query->select(['applications.*', 'projects.*'])->from(['applications'])
        ->innerJoin('projects', 'applications.project_id = projects.id')
        ->where(['applicant_id'=>$id])
        ->all();
        
        return $result;
    }
    
    public static function getAppliedJobsStatus($id, $status)
    {
        if ($status=="AWARDED"){
            $query = new Query();
            $result = $query->select(['applications.*', 'projects.*'])->from(['applications'])
            ->innerJoin('projects', 'applications.project_id = projects.id')
            ->where(['applicant_id'=>$id, 'award_status'=>$status])
            ->all();
        }
        if ($status=="COMPLETED"){
            $query = new Query();
            $result = $query->select(['applications.*', 'projects.*'])->from(['applications'])
            ->innerJoin('projects', 'applications.project_id = projects.id')
            ->where(['applicant_id'=>$id, 'award_status'=>'AWARDED', 'completion_status'=>$status])
            ->all();
        }     
        
        return $result;
    }
    
    public static function getFreelancerPayment()
    {
        $query = new Query();
        $result = $query->select(['applications.*', 'projects.*'])->from(['applications'])
        ->innerJoin('projects', 'applications.project_id = projects.id')
        ->where(['award_status'=>'AWARDED'])
        ->all();
        
        return $result;
    }
}
