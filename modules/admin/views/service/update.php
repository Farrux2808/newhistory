<?php
use app\modules\admin\models\Region;
use app\models\Service;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Service */

$this->title = 'Update Service: ' . Service::decode($model->name, "uz");
$this->params['breadcrumbs'][] = ['label' => 'Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' =>Service::decode($model->name, "uz"), 'url' => ['view', 'id' => $model->id, 'Category_id' => $model->Category_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="service-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
