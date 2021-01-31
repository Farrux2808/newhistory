<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "Activity".
 *
 * @property int $id
 * @property string $action
 * @property string $date
 * @property int $tableId
 * @property string $tableName
 * @property int $Region_id
 *
 * @property Region $region
 */
class Activity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Activity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['action', 'tableId', 'tableName'], 'required'],
            [['date'], 'safe'],
            [['tableId', 'Region_id'], 'integer'],
            [['action', 'tableName'], 'string', 'max' => 45],
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
            'action' => 'Action',
            'date' => 'Date',
            'tableId' => 'Table ID',
            'tableName' => 'Table Name',
            'Region_id' => 'Region ID',
        ];
    }
    public function addAct($action, $tableName, $tableId, $regionId=NULL)
    {
        $row=$this->find()->where(['tableId'=>$tableId])->andwhere(['tableName'=>$tableName])->one();
        if ($row) {
          $row->delete();
        }
        $this->date=date('Y-m-d H:i:s');
        $this->action=$action;
        $this->tableId=$tableId;
        $this->tableName=$tableName;
        $this->Region_id=$regionId;
        $this->save();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['id' => 'Region_id']);
    }
}
