<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $fullName
 * @property string $skills
 * @property string $work
 * @property string $birthday
 * @property string $password
 * @property string $email
 * @property string $phone
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fullName', 'skills', 'work', 'birthday', 'password', 'email', 'phone'], 'required'],
            [['fullName', 'birthday', 'email'], 'string', 'max' => 100],
            [['skills', 'work'], 'string', 'max' => 200],
            [['password'], 'string', 'max' => 300],
            [['phone'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fullName' => 'Full Name',
            'skills' => 'Skills',
            'work' => 'Work',
            'birthday' => 'Birthday',
            'password' => 'Password',
            'email' => 'Email',
            'phone' => 'Phone',
        ];
    }
}
