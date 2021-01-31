<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Category".
 *
 * @property int $id
 * @property string $name
 * @property int $parent_id
 *
 * @property Category $parent
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
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $langru;
    public $languz;
    public $langen;
    public $file;
    public static function tableName()
    {
        return 'Category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['langru', 'image', 'languz', 'langen'], 'required'],
            [['parent_id'], 'integer'],
            [['image'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'langru'=>'Name(RU)',
            'languz'=>'Name(UZ)',
            'langen'=>'Name(EN)',
            'file'=>'Image',
            'parent_id' => 'Parent ID',
        ];
    }
     public function upload()
    {
            if($this->file){
                if (file_exists($this->image)  && !empty($this->file)){
                    unlink($this->image);
                }
                
                $path1 = 'img/uploads/CategoryImages/' . uniqid(md5($this->file->baseName)) . '.' . $this->file->extension;
                $this->file->saveAs($path1);
                $this->image = $path1;
            }
             $this->save(false);
            return true;
       
    }
     public function mulname($model)
    {
        $d=new tasks($model->languz, $model->langru, $model->langen);
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
    public function getParent()
    {
        return $this->hasOne(Category::className(), ['id' => 'parent_id']);
    }
}
