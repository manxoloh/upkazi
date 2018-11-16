<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_education".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $course_name
 * @property string $institution
 * @property string $from_date
 * @property string $to_date
 * @property string $institution_category
 * @property string $certificate
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $user
 */
class UserEducation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_education';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'course_name', 'institution', 'from_date', 'to_date', 'institution_category'], 'required'],
            [['user_id'], 'integer'],
            [['from_date', 'to_date', 'created_at', 'updated_at'], 'safe'],
            ['to_date', 'compare', 'compareAttribute' => 'from_date', 'operator' => '>'],
            [['course_name', 'institution', 'institution_category', 'certificate'], 'string', 'max' => 255],
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
            'course_name' => 'Course Name',
            'institution' => 'Institution',
            'from_date' => 'From Date',
            'to_date' => 'To Date',
            'institution_category' => 'Institution Category',
            'certificate' => 'Certificate',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
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
