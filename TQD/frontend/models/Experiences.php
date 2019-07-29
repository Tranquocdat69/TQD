<?php

namespace frontend\models;

use Yii;
use frontend\models\User;
/**
 * This is the model class for table "experiences".
 *
 * @property int $id
 * @property int $user_id
 * @property string $exp
 * @property string $company
 * @property string $started_date
 * @property string $end_date
 * @property int $created_at
 * @property int $updated_at
 *
 * @property User $user
 */
class Experiences extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'experiences';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'exp', 'company', 'started_date', 'end_date', 'created_at', 'updated_at'], 'required'],
            [['user_id', 'created_at', 'updated_at'], 'integer'],
            [['started_date', 'end_date'], 'safe'],
            [['company'], 'string', 'max' => 255],
           /* ['user_id','default','value']=>Yii::$app->user->identity->id,*/
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'exp' => 'Mô tả công việc',
            'company' => 'Tên công ty',
            'started_date' => 'Ngày bắt đầu',
            'end_date' => 'Ngày kết thúc',
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
