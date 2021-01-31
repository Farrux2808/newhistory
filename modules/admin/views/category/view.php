<?php
use app\models\Category;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = Category::decode($model, "uz");
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
                   return Category::decode($data->name, "uz");
                }
            ],
        ],
    ]) ?>

</div>
