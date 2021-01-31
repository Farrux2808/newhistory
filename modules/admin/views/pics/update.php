<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ServiceImages */

$this->title = 'Update Service Images: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Service Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'Service_id' => $model->Service_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="service-images-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
