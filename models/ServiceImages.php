<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 * This is the model class for table "ServiceImages".
 *
 * @property int $id
 * @property string $image
 * @property int $isLogo isLogo true bo'ladi qachonki image logotip bo'lsa. aks holda false kiritiladi. 
 * @property int $Service_id
 *
 * @property Service $service
 */
class ServiceImages extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ServiceImages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image', 'Service_id'], 'required'],
            [['image'], 'string'],
            [['isLogo', 'Service_id'], 'integer'],
            [['Service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Service::className(), 'targetAttribute' => ['Service_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'file' => Yii::t('app', 'Картинка'),
            'isLogo' => 'Is Logo',
            'Service_id' => 'Service ID',
        ];
    }
    public function upload()
    {
        
            if($this->file){
                if (file_exists($this->image)  && !empty($this->file)){
                    unlink($this->image);
                }
                $path1 = 'img/uploads/ServiceImages/' . uniqid(md5($this->file->baseName)) . '.' . $this->file->extension;
                $this->file->saveAs($path1);
                $this->image = $path1;
            }
             $this->save(false);
            return true;
       
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Service::className(), ['id' => 'Service_id']);
    }

}
