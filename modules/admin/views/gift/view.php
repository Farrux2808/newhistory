<?php
use app\models\Service;
use app\modules\admin\models\GiftItems;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\GiftItems */

$this->title =GiftItems::decode($model, "uz");
$this->params['breadcrumbs'][] = ['label' => 'Gift Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="gift-items-view">

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
        ],
    ]) ?>

</div>
