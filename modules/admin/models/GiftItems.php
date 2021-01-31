<?php

namespace app\modules\admin\models;
use app\models\Service;
use Yii;

/**
 * This is the model class for table "GiftItems".
 *
 * @property int $id
 * @property string $name
 * @property int $balanceForItem Sovg'a berish uchun user kerakli bo'lgan ball miqdori. 
 * @property int $Service_id
 *
 * @property Service $service
 */


class jsonEncodeGift
{
    public $ru;
    public $uz;
    public $en;
    public function __construct($name_uz, $name_ru, $name_en)
    {
        $this->uz=$name_uz;
        $this->ru=$name_ru;
        $this->en=$name_en;
    }

   
}


class GiftItems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $name_uz;
    public $name_ru;
    public $name_en;
    public static function tableName()
    {
        return 'GiftItems';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_ru', 'name_uz', 'name_en', 'balanceForItem', 'Service_id'], 'required'],
            [['balanceForItem', 'Service_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
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
            'name_uz'=>'Name(UZ)',
            'name_ru'=>'Name(RU)',
            'name_en'=>'Name(EN)',
            'balanceForItem' => 'Balance For Item',
            'Service_id' => 'Service ID',
        ];
    }
     public function mulname($model)
    {
        $d=new jsonEncodeGift($model->name_uz, $model->name_ru, $model->name_en);
        $json =json_encode((array)$d, JSON_UNESCAPED_UNICODE);
        $this->name=$json;
        return true;
    }

    public function decode($model, $lang)
    {       

            $d=$model->name;
            $json=json_decode($d, JSON_UNESCAPED_UNICODE);
            $un=$json[$lang];
        return $un;

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Service::className(), ['id' => 'Service_id']);
    }
}
