<?php

namespace app\models;
use yii\web\UploadedFile;

use Yii;

/**
 * This is the model class for table "articles".
 *
 * @property int $id
 * @property string $title
 * @property int $userId
 * @property string $edition
 * @property int $editionCount
 * @property string $avtor
 * @property string $url
 * @property int $category_id
 */
class Articles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'articles';
    }

    /**
     * @var UploadedFile
     */
    public $file;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'userId', 'edition', 'editionCount', 'avtor', 'url', 'category_id'], 'required'],
            [['title'], 'string'],
            [['userId', 'editionCount', 'category_id'], 'integer'],
            [['edition', 'avtor'], 'string', 'max' => 200],
            // [['url'], 'string', 'max' => 300],
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->url->saveAs('uploads/' . $this->url->baseName . '.' . $this->url->extension);
            return true;
        } else {
            return false;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'userId' => 'User ID',
            'edition' => 'Edition',
            'editionCount' => 'Edition Count',
            'avtor' => 'Avtor',
            'url' => 'Url',
            'category_id' => 'Category ID',
        ];
    }
}
