<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "document".
 *
 * @property int $id
 * @property int $user_id
 * @property string $dcm
 * @property string $desc
 * @property int $created_at
 * @property int $updated_at
 *
 * @property User $user
 */

class Document extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $file;
    public static function tableName()
    {
        return 'document';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'dcm', 'desc', 'created_at', 'updated_at'], 'required'],
            [['user_id', 'created_at', 'updated_at'], 'integer'],
            [['dcm', 'desc'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['file'],'file','extensions'=>'docx,jpg,png,pdf,exe','maxSize' => 5048576]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'dcm' => 'Tài liệu văn bản',
            'desc' => 'Mô tả',
            'created_at' => 'Ngày tạo',
            'updated_at' => 'Ngày cập nhật',
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
