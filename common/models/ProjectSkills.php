<?php

namespace common\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "project_skills".
 *
 * @property integer $id
 * @property integer $project_id
 * @property integer $skill_id
 *
 * @property SkillSet $skill
 * @property Projects $project
 */
class ProjectSkills extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project_skills';
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'skill_id'], 'integer'],
            [['skill_id'], 'exist', 'skipOnError' => true, 'targetClass' => SkillSet::className(), 'targetAttribute' => ['skill_id' => 'skill_id']],
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
            'project_id' => 'Project ID',
            'skill_id' => 'Required Skills (Optional)',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSkill()
    {
        return $this->hasOne(SkillSet::className(), ['skill_id' => 'skill_id']);
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
    public static function getProjectSkills($id)
    {
        $query = new Query();
        $record = $query->select(['project_skills.*', 'skill_set.*']) ->from('project_skills') ->innerJoin('skill_set', 'skill_set.skill_id = project_skills.skill_id')
        ->where(['project_skills.project_id'=>$id])->createCommand()->queryAll();
        
        return $record;
    }
}
