<?php

namespace app\models;
use Yii;
use yii\helpers\Json;
use  app\models\ServiceImages;

/**
 * This is the model class for table "Service".
 *
 * @property int $id
 * @property string $name
 * @property string $info
 * @property double $lat
 * @property double $long
 * @property string $address
 * @property string $password
 * @property string $saleInfo
 * @property int $Category_id
 * @property int $Region_id
 * @property int $isActive
 *
 * @property GiftItems[] $giftItems
 * @property Outgoings[] $outgoings
 * @property Category $category
 * @property Region $region
 * @property ServiceImages[] $serviceImages
 * @property UserBalances[] $userBalances
 * @property Visits[] $visits
 */
class jsonEncode
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
class Service extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $name_ru;
    public $name_uz;
    public $name_en;
    public $address_ru;
    public $address_uz;
    public $address_en;
    public $info_uz;
    public $info_ru;
    public $info_en;
    public $logo;
    public static function tableName()
    {
        return 'Service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_uz', 'name_ru', 'name_en', 'address_en', 'info_en', 'address_uz', 'address_ru', 'info_uz', 'info_ru', 'password', 'saleInfo', 'Category_id', 'Region_id', 'phone'], 'required'],
            [['info'], 'string'],
            [['lat', 'long'], 'number'],
            [['Category_id', 'Region_id', 'isActive'], 'integer'],
            [['name', 'address', 'password'], 'string', 'max' => 255],
            [['saleInfo'], 'string', 'max' => 512],
            [['Category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['Category_id' => 'id']],
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
            'phone'=>'Phone',
            'lat' => 'Lat',
            'long' => 'Long',
            'name_uz'=>'Name(UZ)',
            'name_ru'=>'Name(RU)',
            'name_en'=>'Name(EN)',
            'info_ru'=>'Info(RU)',
            'info_uz'=>'Info(UZ)',
            'info_en'=>'Info(EN)',
            'logo'=>'Logo',
            'address_uz'=>'Addres(UZ)',
            'address_ru'=>'Addres(RU)',
            'address_en'=>'Addres(EN)',
            'password' => 'Password',
            'saleInfo' => 'Sale Info',
            'Category_id' => 'Category ID',
            'Region_id' => 'Region ID',
            'isActive' => 'Is Active',
        ];
    }
    public function mulname($model)
    {
        $this->info=Json::encode([
            "uz"=>$model->info_uz,
            "ru"=>$model->info_ru,
            "en"=>$model->info_en
        ]);
        $this->name=Json::encode([
            "uz"=>$model->name_uz,
            "ru"=>$model->name_ru,
            "en"=>$model->name_uz
        ]);
        $this->address=Json::encode([
            "uz"=>$model->address_uz,
            "ru"=>$model->address_ru,
            "en"=>$model->address_en
        ]);
        return true;

    }
    public function decode($modelName, $lang)
    {       
            $json=json_decode($modelName, JSON_UNESCAPED_UNICODE);
            $un=$json[$lang];
        return $un;

    }
    public function addPass($password){
        $pass=password_hash($password, PASSWORD_BCRYPT);
        $this->password=str_replace("$2y$", "$2b$", $pass);
        return true;
    }
        public function rasmLar($serviceId)
    {
        $model=ServiceImages::find()->where(['Service_id'=>$serviceId, 'isLogo'=>'1'])->one();
        return $model;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGiftItems()
    {
        return $this->hasMany(GiftItems::className(), ['Service_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOutgoings()
    {
        return $this->hasMany(Outgoings::className(), ['Service_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'Category_id']);
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
    public function getServiceImages()
    {
        return $this->hasMany(ServiceImages::className(), ['Service_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserBalances()
    {
        return $this->hasMany(UserBalances::className(), ['Service_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVisits()
    {
        return $this->hasMany(Visits::className(), ['Service_id' => 'id']);
    }
}
