<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Slider */

$this->title = Yii::t('app', 'Добавить слайд');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Слайдер'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slider-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
