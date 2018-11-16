<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "payment_methods".
 *
 * @property integer $id
 * @property string $method_type
 */
class PaymentMethod extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payment_methods';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['method_type'], 'required'],
            [['method_type'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'method_type' => 'Method Type',
        ];
    }
}
