<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "resume".
 *
 * @property integer $application_id
 * @property string $filename
 * @property string $upload_date
 *
 * @property Applications $application
 */
class Resume extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resume';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['application_id', 'filename'], 'required'],
            [['application_id'], 'integer'],
            [['upload_date'], 'safe'],
            [['filename'], 'string', 'max' => 255],
            [['application_id'], 'exist', 'skipOnError' => true, 'targetClass' => Applications::className(), 'targetAttribute' => ['application_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'application_id' => 'Application ID',
            'filename' => 'Filename',
            'upload_date' => 'Upload Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApplication()
    {
        return $this->hasOne(Applications::className(), ['id' => 'application_id']);
    }
}
