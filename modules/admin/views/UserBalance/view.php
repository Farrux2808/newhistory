<?php

use yii\grid\GridView;
use yii\db\ActiveRecord;
use yii\helpers\Html;
use app\models\Service;
/* @var $this yii\web\View */
$this->title = $user[0]->name;
?>


<?= GridView::widget([
        
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'format' => 'html',
                'attribute' => 'service.name',
                'value' => function($data){            
                    return Service::decode($data->service->name, "uz");
                }
            ],
            'amount',
            
        ],
        
    ]);?>
    