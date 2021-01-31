<?php
use app\modules\admin\models\Region;
use app\models\Service;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Service */

$this->title = Service::decode($model->name, "uz");
$this->params['breadcrumbs'][] = ['label' => 'Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="service-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'Category_id' => $model->Category_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'Category_id' => $model->Category_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
            [
                'format' => 'html',
                'attribute' => 'name',
                'value' => function($data){
                   return Service::decode($data->name, "uz");
                }
            ],
            [
                'format' => 'html',
                'attribute' => 'info',
                'value' => function($data){
                   return Service::decode($data->info, "uz");
                }
            ],
            //'lat',
            //'long',
            'phone',
            [
                'format' => 'html',
                'attribute' => 'address',
                'value' => function($data){
                   return Service::decode($data->address, "uz");
                }
            ],
            //'password',
            'saleInfo',

            [
                'format' => 'html',
                'attribute' => 'Category_id',
                'value' => $model->category->name
            ],

            [
                'format' => 'html',
                'attribute' => 'Region_id',
                'value' => function($data){
                   return Region::decode($data->region, "uz");
                }
            ],
            //'isActive',
        ],
    ]) ?>

</div>
