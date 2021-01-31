<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Service Images';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-images-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Service Images', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'format' => 'html',
                'attribute' => 'image',
                'value' => function($data){
                    return "<img src='/". $data->image ."' height='70px'>";
                }
            ],
            'isLogo',
                    [
                        'format' => 'html',
                        'attribute' => 'Service_id',
                        'value' => function($data){
                            return $data->service->name;
                        }
                    ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
