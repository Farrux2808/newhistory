<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователей';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать пользователей', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            'phone',
            //'password',
            'isAdmin' => [
                'format' => 'html',
                'label' => 'Роль',
                'value' => function($data) {
                    return \app\modules\admin\models\User::getRole($data->isAdmin);
                }
            ],
            //'job',
            //'gender',
            'verified',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
