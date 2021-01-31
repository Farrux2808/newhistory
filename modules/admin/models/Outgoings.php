<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "Outgoings".
 *
 * @property int $id
 * @property int $amount Bitta sovg'a uchun userda bo'lishi kerak bo'lgan ball miqdori.
 * @property string $date
 * @property int $User_id
 * @property int $Service_id
 * @property string $aboutOutgoing
 *
 * @property Service $service
 * @property User $user
 */
class Outgoings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Outgoings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['amount', 'date', 'User_id', 'Service_id', 'aboutOutgoing'], 'required'],
            [['amount', 'User_id', 'Service_id'], 'integer'],
            [['date'], 'safe'],
            [['aboutOutgoing'], 'string', 'max' => 255],
            [['Service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Service::className(), 'targetAttribute' => ['Service_id' => 'id']],
            [['User_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['User_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'amount' => 'Amount',
            'date' => 'Date',
            'User_id' => 'User ID',
            'Service_id' => 'Service ID',
            'aboutOutgoing' => 'About Outgoing',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Service::className(), ['id' => 'Service_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'User_id']);
    }
}
