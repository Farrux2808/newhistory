<?php
use app\modules\admin\models\GiftItems;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gift Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gift-items-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Gift Items', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'model'=>$model,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id',
           [
                'format' => 'html',
                'attribute' => 'name',
                'value' => function($data){
                   return GiftItems::decode($data, "uz");
                }
            ],
            'balanceForItem',
             [
                        'format' => 'html',
                        'attribute' => 'Service_id',
                        'value' => function($data){
                            return GiftItems::decode($data->service, "uz");
                        }
                    ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
