<?php

namespace app\modules\admin\models;

use Yii;
use yii\helpers\Html;
/**
 * This is the model class for table "User".
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $password
 * @property int $isAdmin
 * @property string $job
 * @property int $gender gender  1 kiritiladi agar erkak bo'lsa 0 kiritiladi agar ayol bo'lsa   
 * @property int $Region_id
 * @property int $verified
 *
 * @property Outgoings[] $outgoings
 * @property Region $region
 * @property UserBalances[] $userBalances
 * @property Visits[] $visits
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'User';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'password', 'job', 'Region_id'], 'required'],
            [['isAdmin', 'gender', 'Region_id', 'verified'], 'integer'],
            [['name', 'phone', 'password', 'job'], 'string', 'max' => 255],
            [['Region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['Region_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'phone' => 'Телефон',
            'password' => 'Пароль',
            'isAdmin' => 'Админ?',
            'job' => 'Работа',
            'gender' => 'Пол',
            'Region_id' => 'Область ID',
            'verified' => 'Проверенный',
        ];
    }
     public function addUser($model)
    {
        $this->password = password_hash($model->password, PASSWORD_DEFAULT);
        return true;
    }
    public function getRole($role){
        if($role == 0)
        {
            $role = '<span class=\'label label-success\'>Пользователь</span>';
        }
            elseif ($role == 1)
        {
            $role = '<span class=\'label label-primary\'>Админ</span>';
        }
            else
        {
            $role = '<span class=\'label label-info\'>Модератор</span>';
        }
        return $role;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOutgoings()
    {
        return $this->hasMany(Outgoings::className(), ['User_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['id' => 'Region_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserBalances()
    {
        return $this->hasMany(UserBalances::className(), ['User_id' => 'id']);
    }

    public function getBalance()
    {
        return $this->hasMany(UserBalances::className(), ['User_id' => 'id'])->sum('amount');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVisits()
    {
        return $this->hasMany(Visits::className(), ['User_id' => 'id']);
    }
}
