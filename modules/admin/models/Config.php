<?php

namespace app\modules\admin\models;

use Yii;
use yii\helpers\json;

/**
 * This is the model class for table "Config".
 *
 * @property int $id
 * @property string $appRules
 */
class Config extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $info_uz;
    public $info_ru;
    public $info_en;

    public static function tableName()
    {
        return 'Config';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'info_uz', 'info_ru','info_en'], 'required'],
            [['appRules'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'info_ru'=>'Info(RU)',
            'info_uz'=>'Info(UZ)',
            'info_en'=>'Info(EN)',
            'appRules' => 'App Rules',
        ];
    }

    public function mulname($model)
    {
        $jsonInfo=json::encode([
            "uz" => $model->info_uz,
            "ru" =>  $model->info_ru,
            "en" => $model->info_en,
          ]);
        $this->appRules=$jsonInfo;
        return true;
    }
    public function decode($modelName, $lang)
    {       
        $json=json_decode($modelName, JSON_UNESCAPED_UNICODE);
        $un=$json[$lang];
        return $un;

    }
}
