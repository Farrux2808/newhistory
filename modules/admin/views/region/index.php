<?php
use app\modules\admin\models\Region;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Регионы.';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="region-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать регион', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
             [
                        'format' => 'html',
                        'attribute' => 'name',
                        'value' => function($data){
                            return Region::decode($data, "uz");
                        }
                    ],
            [
                'format' => 'html',
                'attribute' => 'Region_id',
                'value' => function($data){
                   return Region::decode($data->region, "uz");
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
