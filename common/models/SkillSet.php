<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "skill_set".
 *
 * @property integer $skill_id
 * @property integer $skill_name
 *
 * @property ProjectSkills[] $projectSkills
 */
class SkillSet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'skill_set';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['skill_name'], 'required'],
            [['skill_name'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'skill_id' => 'Skill ID',
            'skill_name' => 'Skill Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectSkills()
    {
        return $this->hasMany(ProjectSkills::className(), ['skill_id' => 'skill_id']);
    }
}
