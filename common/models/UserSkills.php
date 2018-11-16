<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_skills".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $skill_id
 *
 * @property User $user
 * @property SkillSet $skill
 */
class UserSkills extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_skills';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'skill_id'], 'required'],
            [['user_id', 'skill_id'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['skill_id'], 'exist', 'skipOnError' => true, 'targetClass' => SkillSet::className(), 'targetAttribute' => ['skill_id' => 'skill_id']],
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
            'skill_id' => 'Skill ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSkill()
    {
        return $this->hasOne(SkillSet::className(), ['skill_id' => 'skill_id']);
    }
}
