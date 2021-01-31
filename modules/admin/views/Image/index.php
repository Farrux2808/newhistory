<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\admin\models\Images;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Images';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="images-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Images', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'format' => 'html',
                'attribute' => 'image',
                'value' => function($data){

                    return "<img src='/". Images::decode($data->image, "uz") ."' height='70px'>";
                }
            ],
            'isAdvertisement',
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
