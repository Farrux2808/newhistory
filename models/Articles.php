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
            [['edition', 'avtor', 'url'], 'string', 'max' => 300],
            // [['file'], 'file'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            if (file_exists($this->url)  && !empty($this->file)){
                unlink($this->url);
            }
            
            $path = 'assets/uploads/' . uniqid(md5($this->file->baseName)) . '.' . $this->file->extension;
            $this->file->saveAs($path);
            $this->url = $path;
            $this->save(false);
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
