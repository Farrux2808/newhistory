<?php

namespace app\modules\admin\models;
use Yii;
use yii\helpers\Json;

/**
 * This is the model class for table "Region".
 *
 * @property int $id
 * @property string $name
 * @property string $nam
 * @property int $Region_id
 *
 * @property CallCenter[] $callCenters
 * @property Region $region
 * @property Region[] $regions
 * @property Service[] $services
 */
class tasks
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
class Region extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $langru;
    public $languz;
    public $langen;
    public static function tableName()
    {
        return 'Region';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name','languz', 'langru', 'langen'], 'required'],
            [['Region_id'], 'integer'],
            [['name', 'languz', 'langru','langen'], 'string', 'max' => 255],
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
            'langru'=>'Имя(RU)',
            'languz'=>'Имя(UZ)',
            'langen'=>'Имя(EN)',
            'Region_id' => 'Регион',
            'name'=>'Имя',
        ];
    }

    public function mulname($model)
    {
       $this->name=Json::encode([
            "uz"=>$model->languz,
            "ru"=>$model->langru,
            "en"=>$model->langen
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        return true;

    }

    public function decode($model, $lang)
    {       
            $d=$model->name;
            $json=json_decode($d, JSON_UNESCAPED_UNICODE);
            $un=$json[$lang];
        return $un;

    }

    public function decodeArray($modelName, $lang)
    {       
       
            $json=json_decode($d, JSON_UNESCAPED_UNICODE);
            $array = [];

            foreach ($modelName as $key=>$mod) {
                $json=json_decode($mod, JSON_UNESCAPED_UNICODE);

                if ($json[$lang]) {
                     $un=$json[$lang];
                    $array[$key]=$un;
                }
            }
        return $array;

    }
    

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCallCenters()
    {
        return $this->hasMany(CallCenter::className(), ['Region_id' => 'id']);
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
    public function getRegions()
    {
        return $this->hasMany(Region::className(), ['Region_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServices()
    {
        return $this->hasMany(Service::className(), ['Region_id' => 'id']);
    }
}
