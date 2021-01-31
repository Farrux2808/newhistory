<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\CallCenter */

$this->title = 'Update Call Center: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Call Centers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'Region_id' => $model->Region_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="call-center-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
