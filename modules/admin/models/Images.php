<?php

namespace app\modules\admin\models;

use Yii;
use yii\helpers\json;

/**
 * This is the model class for table "Images".
 *
 * @property int $id
 * @property string $image
 * @property int $isAdvertisement Agar kiritilgan rasm reklama uchun bo'lsa isAdvertisement true bo'ladi. 
 * @property int $status Rasm statusi
 */

class Images extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $file_uz;
    public $file_ru;
    public $file_en;

    public static function tableName()
    {
        return 'Images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image'], 'required'],
            [['isAdvertisement', 'status'], 'integer'],
            [['image', 'file_uz', 'file_ru', 'file_en'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'file_uz' => 'Image(uz)',
            'file_ru' => 'Image(ru)',
            'file_en' => 'Image(en)',
            'isAdvertisement' => 'Is Advertisement',
            'status' => 'Status',
        ];
    }
    public function upload()
    {
        
        if($this->file_uz){
            if (file_exists($this->decode($this->image, "uz"))  && !empty($this->file_uz)){
                unlink($this->decode($this->image, "uz"));
            }
            
            $path1 = 'img/uploads/slide/' . uniqid(md5($this->file_uz->baseName)) . '.' . $this->file_uz->extension;
            $this->file_uz->saveAs($path1);
        }
        if($this->file_ru){
            if (file_exists($this->decode($this->image, "ru"))  && !empty($this->file_ru)){
                unlink($this->decode($this->image, "ru"));
            }
            
            $path2 = 'img/uploads/slide/' . uniqid(md5($this->file_ru->baseName)) . '.' . $this->file_ru->extension;
            $this->file_ru->saveAs($path2);
        }
        if($this->file_en){
            if (file_exists($this->decode($this->image, "en"))  && !empty($this->file_en)){
                unlink($this->decode($this->image, "en"));
            }
            
            $path3 = 'img/uploads/slide/' . uniqid(md5($this->file_en->baseName)) . '.' . $this->file_en->extension;
            $this->file_en->saveAs($path3);
        }
            $json =json::encode([
                "uz" => $path1,
                "ru" => $path2,
                "en" => $path3
              ]);
            $this->image=$json;
            $this->save(false);
            return true;
       
    }

    public function decode($modelName, $lang)
    {       
        $json=json_decode($modelName, JSON_UNESCAPED_UNICODE);
        $un=$json[$lang];
        return $un;

    }
}
