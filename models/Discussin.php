<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "discussin".
 *
 * @property int $id
 * @property int $articleId
 * @property int $userId
 * @property string $text
 * @property string $date
 */
class Discussin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'discussin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['articleId', 'userId', 'text', 'date'], 'required'],
            [['articleId', 'userId'], 'integer'],
            [['text'], 'string'],
            [['date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'articleId' => 'Article ID',
            'userId' => 'User ID',
            'text' => 'Text',
            'date' => 'Date',
        ];
    }
}
