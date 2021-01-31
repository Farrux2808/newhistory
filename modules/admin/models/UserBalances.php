<?php

namespace app\modules\admin\models;

use Yii;
use app\models\Service;

/**
 * This is the model class for table "UserBalances".
 *
 * @property int $id
 * @property int $amount
 * @property int $User_id
 * @property int $Service_id
 *
 * @property Service $service
 * @property User $user
 */
class UserBalances extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'UserBalances';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['amount', 'User_id', 'Service_id'], 'integer'],
            [['User_id', 'Service_id'], 'required'],
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
            'User_id' => 'User ID',
            'Service_id' => 'Service ID',
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
