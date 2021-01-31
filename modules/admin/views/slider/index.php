<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Слайдер');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slider-index">


    <p>
        <?= Html::a(Yii::t('app', 'Добавить'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'format' => 'html',
                'attribute' => 'image_ru',
                'value' => function($data){
                    return "<img src='/". $data->image_ru ."' height='70px'>";
                }
            ],
//            'title_ru',
//            'title_uz',
//            'image_uz',
            'state',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
