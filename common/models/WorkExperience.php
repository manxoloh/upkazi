<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "work_experience".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $job_title
 * @property string $company_name
 * @property string $job_responsibilities
 * @property string $from_date
 * @property string $to_date
 * @property string $created_at
 *
 * @property User $user
 */
class WorkExperience extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'work_experience';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'job_title', 'company_name', 'job_responsibilities', 'from_date', 'to_date'], 'required'],
            [['user_id'], 'integer'],
            [['job_responsibilities'], 'string'],
            [['from_date', 'to_date', 'created_at'], 'safe'],
            ['to_date', 'compare', 'compareAttribute' => 'from_date', 'operator' => '>'],
            [['job_title', 'company_name'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'job_title' => 'Job Title',
            'company_name' => 'Company Name',
            'job_responsibilities' => 'Job Responsibilities',
            'from_date' => 'From Date',
            'to_date' => 'To Date',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
