<?php

namespace common\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "user_profile".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $avator
 * @property string $firstname
 * @property string $middlename
 * @property string $lastname
 * @property string $phone
 * @property string $website
 * @property string $country
 * @property string $city
 * @property string $about
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $user
 */
class UserProfile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $profilePhoto;
    
    public static function tableName()
    {
        return 'user_profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'city'], 'required'],
            [['user_id'], 'integer'],
            [['about'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['avator', 'firstname', 'middlename', 'lastname', 'phone', 'website', 'country', 'city'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['profilePhoto'], 'file', 'skipOnEmpty' => true],
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
            'avator' => 'Avator',
            'firstname' => 'Firstname',
            'middlename' => 'Middlename',
            'lastname' => 'Lastname',
            'gender' => 'Gender',
            'phone' => 'Phone',
            'date_of_birth' => 'Date Of Birth',
            'website' => 'Website',
            'country' => 'Country',
            'city' => 'City',
            'about' => 'About',
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
    public static function getUserProfile($id)
    {
        $query = new Query();
        $record = $query->select(['user_profile.*', 'user.*']) ->from('user_profile') ->innerJoin('user', 'user.id = user_profile.user_id')
        ->where(['user_profile.user_id'=>$id])->createCommand()->queryAll();
        
        return $record;
    }
    public static function getFreelancers()
    {
        $query = new Query();
        $record = $query->select(['user_profile.*', 'user.*']) ->from('user_profile') ->innerJoin('user', 'user.id = user_profile.user_id')
        ->createCommand()->queryAll();
        
        return $record;
    }
} 

