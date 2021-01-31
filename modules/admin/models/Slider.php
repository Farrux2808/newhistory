<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "slider".
 *
 * @property int $id
 * @property string $title_ru
 * @property string $title_uz
 * @property string $image_ru
 * @property string $image_uz
 * @property string $state
 */
class Slider extends \yii\db\ActiveRecord
{
    public $file_ru;
    public $file_uz;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['state'], 'string'],
            [['title_ru', 'title_uz', 'image_ru', 'image_uz'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title_ru' => Yii::t('app', 'Текст(ru)'),
            'title_uz' => Yii::t('app', 'Текст(uz)'),
            'file_ru' => Yii::t('app', 'Картинка(ru)'),
            'file_uz' => Yii::t('app', 'Картинка(uz)'),
            'state' => Yii::t('app', 'Статус'),
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            if($this->file_ru){
                if (file_exists($this->image_ru)  && !empty($this->file_ru)){
                    unlink($this->image_ru);
                }
                $path1 = 'img/uploads/slide/' . uniqid(md5($this->file_ru->baseName)) . '.' . $this->file_ru->extension;
                $this->file_ru->saveAs($path1);
                $this->image_ru = $path1;
            }

            if($this->file_uz){
                if (file_exists($this->image_uz)  && !empty($this->file_uz)){
                    unlink($this->image_uz);
                }
                $path2 = 'img/uploads/slide/' . uniqid(md5($this->file_uz->baseName)) . '.' . $this->file_uz->extension;
                $this->file_uz->saveAs($path2);
                $this->image_uz = $path2;
            }
            $this->save(false);
            return true;
        } else {
            return false;
        }
    }

}
