<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "faxriylar".
 *
 * @property int $id
 * @property string $fio
 * @property string $urlRasm
 */
class Faxriylar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'faxriylar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio', 'urlRasm'], 'required'],
            [['fio', 'urlRasm'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'Fio',
            'urlRasm' => 'Url Rasm',
        ];
    }
}
