<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "messages".
 *
 * @property integer $id
 * @property string $sender
 * @property string $receiver
 * @property string $subject
 * @property string $body
 * @property string $attachment
 * @property string $timestamp
 * @property string $status
 */
class Messages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'messages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sender', 'receiver', 'subject', 'body'], 'required'],
            [['body'], 'string'],
            [['timestamp'], 'safe'],
            [['sender', 'receiver', 'subject', 'attachment', 'status'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sender' => 'Sender',
            'receiver' => 'Receiver',
            'subject' => 'Subject',
            'body' => 'Body',
            'attachment' => 'Attachment',
            'timestamp' => 'Timestamp',
            'status' => 'Status',
        ];
    }
}
