<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Slider */
$this->title = 'Слайд: '. $model->id;

?>
<div class="slider-view">


    <p>
        <?= Html::a(Yii::t('app', 'Изменить'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Удалить'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
//            'title_ru',
            [
                'format' => 'html',
                'attribute' => 'image_ru',
                'value' => function($data){
                    return "<img src='/". $data->image_ru ."' height='300px'>";
                }
            ],
//            'title_uz',
            [
                'format' => 'html',
                'attribute' => 'image_uz',
                'value' => function($data){
                    return "<img src='/". $data->image_uz ."' height='300px'>";
                }
            ],
            'state',
        ],
    ]) ?>

</div>
