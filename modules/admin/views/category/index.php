<?php
use app\models\Category;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Категории');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <p>
        <?= Html::a(Yii::t('app', 'Добавить'), ['create'], ['class' => 'btn btn-success']) ?>
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
                    return Category::decode($data, "uz");
                }
            ],
            [
                'format' => 'html',
                'attribute' => 'image',
                'value' => function($data){
                    return "<img src='/". $data->image ."' height='70px'>";
                }
            ],
            [
                'format' => 'html',
                'attribute' => 'parent_id',
                'value' => function($data){
                   return Category::decode($model, "uz");
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
