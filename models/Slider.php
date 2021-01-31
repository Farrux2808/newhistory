<?php

namespace app\models;

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
            'id' => 'ID',
            'title_ru' => 'Title Ru',
            'title_uz' => 'Title Uz',
            'image_ru' => 'Image Ru',
            'image_uz' => 'Image Uz',
            'state' => 'State',
        ];
    }
}
