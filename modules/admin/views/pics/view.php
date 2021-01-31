<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ServiceImages */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Service Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="service-images-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'Service_id' => $model->Service_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'Service_id' => $model->Service_id], [
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
            'id',
            [
                'format' => 'html',
                'attribute' => 'image',
                'value' => function($data){
                    return "<img src='/". $data->image ."' height='70px'>";
                }
            ],
            'isLogo',
            'Service_id',
        ],
    ]) ?>

</div>
