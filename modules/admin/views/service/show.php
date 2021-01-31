<?php
use app\models\Service;
use app\models\User;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Comming');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partners-index">

 <div class="nav-tabs-custom mt-3">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#uz" data-toggle="tab" aria-expanded="false"><b>COMMING</b></a></li>
            <li class=""><a href="#ru" data-toggle="tab" aria-expanded="false"><b>GIFT</b></a></li>
        </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="uz">
                  <div class="box-body">
            
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
            [
                'format' => 'html',
                'attribute' => 'user.name',
                'value' => function($data){
                    $model=User::find(['id'=>$data->User_id])->one();
                    return $model->name;
                }
            ],
            'date',            
            ],
        ]); ?>
        </div>
                </div>

                <div class="tab-pane" id="ru">
                   <?= GridView::widget([
            'dataProvider' => $dataProvider1,
            'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'format' => 'html',
                'attribute' => 'user.name',
                'value' => function($data){
                    $model=User::find(['id'=>$data->User_id])->one();
                    return $model->name;
                }
            ],
            'amount',
            'aboutOutgoing',
            'date',            
            ],
        ]); ?>
                </div>
            </div>
</div>

</div>
