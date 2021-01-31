<?php
use app\models\Service;
use app\models\ServiceImages;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Партнеры');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partners-index">



    <div class="box box-info">
        <div class="box-header text-right">
            <?= Html::a(Yii::t('app', 'Добавить'), ['create'], ['class' => 'btn btn-success']) ?>
        </div>
        <div class="box-body">
            
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //'id',
            [
                'format' => 'html',
                'attribute' => 'name',
                'value' => function ($data) {
                     return Html::a(Service::decode($data->name, "uz"), '/admin/service/show?id='.$data->id);
                 }
            ],
            [
                'format' => 'html',
                'attribute' => 'serviceImages.image',
                'value' => function($data){
                    $model=ServiceImages::find(['Service_id'=>$data->id])->where(['isLogo'=>'1'])->one();
                    $image=$model->image;
                    return "<img src='/".$image."' height='70px'>";
                }
            ],


               // 'lat',
               // 'long',
            // [
            //     'format' => 'html',
            //     'attribute' => 'address',
            //     'value' => function($data){
            //        return Service::decode($data->address, "uz");
            //     }
            // ],
                //'password',
                //'saleInfo',
                //'Category_id',
                //'Region_id',
                //'isActive',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
        </div>
    </div>


</div>
