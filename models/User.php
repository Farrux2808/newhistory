<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "User".
 *
 * @property int $id
 * @property string $username
 * @property string $phone
 * @property string $password
 * @property int $isAdmin
 * @property string $job
 * @property int $gender gender  1 kiritiladi agar erkak bo'lsa 0 kiritiladi agar ayol bo'lsa   
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


    public function getRole($role){
        if($role == 0){
            $role = '<span class=\'label label-success\'>Пользователь</span>';
        }elseif ($role == 1){
            $role = '<span class=\'label label-primary\'>Админ</span>';
        }else{
            $role = '<span class=\'label label-info\'>Модератор</span>';
        }
        return $role;
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'phone', 'password', 'job'], 'required'],
            [['isAdmin', 'gender'], 'integer'],
            [['username', 'phone', 'password', 'job'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => Yii::t('app', 'Логин'),
            'phone' => 'Phone',
            'password' => Yii::t('app', 'Пароль'),
            'isAdmin' => 'Is Admin',
            'job' => 'Job',
            'gender' => 'Gender',
        ];
    }


 public function upload()
    {
        if ($this->validate() && $this->file) {
            if (file_exists($this->img)  && !empty($this->file)){
                unlink($this->img);
            }

            $path = 'img/uploads/users/' . uniqid(md5($this->file->baseName)) . '.' . $this->file->extension;
            $this->file->saveAs($path);
            $this->img = $path;
            $this->save(false);
            return true;
        } else {
            return false;
        }
    }

    public function addUser($model)
    {
        $date = new DateTime();
        $this->username = Html::encode($model->username);
        $this->email = Html::encode($model->email);
        $this->password = password_hash($model->password, PASSWORD_DEFAULT);
        $this->status = Html::encode($model->status);
        $this->alias = uniqid('e');
        $this->created_at = $date->getTimestamp();
        $this->updated_at = $date->getTimestamp();
        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->upload();
        }
        return true;
    }

    public function upUser($model)
    {
        $date = new DateTime();
        if ($this->validate()){
            $this->username = Html::encode(trim($model->username));
            $this->email = Html::encode(trim($model->email));
            $this->status = Html::encode(trim($model->status));
            if($this->password != $model->password){
                $this->password = password_hash($model->password, PASSWORD_DEFAULT);
            }
            $this->updated_at = $date->getTimestamp();

            $this->save();
        }


        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->upload();
        }
        return true;
    }

}
