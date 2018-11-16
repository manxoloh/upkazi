<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "project_files".
 *
 * @property integer $id
 * @property integer $project_id
 * @property integer $submitted_by
 * @property string $filename
 * @property string $status
 * @property string $submission_date
 *
 * @property Projects $project
 * @property User $submittedBy
 */
class ProjectFiles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $project_files;
    public static function tableName()
    {
        return 'project_files';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'submitted_by', 'filename'], 'required'],
            [['project_id', 'submitted_by'], 'integer'],
            [['submission_date'], 'safe'],
            [['filename', 'status'], 'string', 'max' => 255],            
            [['project_files'], 'file', 'skipOnEmpty' => true, 'maxFiles' => 10],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Projects::className(), 'targetAttribute' => ['project_id' => 'id']],
            [['submitted_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['submitted_by' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => 'Project ID',
            'submitted_by' => 'Submitted By',
            'filename' => 'Filename',
            'status' => 'Status',
            'submission_date' => 'Submission Date',
            'project_files'=>'Project Files',
        ];
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
    public function getSubmittedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'submitted_by']);
    }
}
