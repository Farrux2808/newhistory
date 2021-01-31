<?php

use yii\grid\GridView;
use yii\db\ActiveRecord;
use yii\helpers\Html;
use yii\widgets\Pjax;

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php Pjax::begin(); ?>
    <?= GridView::widget([
        
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'format' => 'html',
                'attribute' => 'name',
                'value' => function ($dataProvider) {
                    return Html::a($dataProvider -> name, '/admin/userbalance/view?id='.$dataProvider -> id );
                },
            ],
            'balance',
            
        ],
        
    ]);?>
<?php Pjax::end(); ?>

    