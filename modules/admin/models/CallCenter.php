<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "CallCenter".
 *
 * @property int $id
 * @property string $phone
 * @property int $Region_id
 *
 * @property Region $region
 */
class CallCenter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'CallCenter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phone', 'Region_id'], 'required'],
            [['phone'], 'string'],
            [['Region_id'], 'integer'],
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
            'phone' => 'Phone',
            'Region_id' => 'Region ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['id' => 'Region_id']);
    }
}
