<?php
use app\modules\admin\models\Region;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Region */

$this->title = 'Обновить регион: ' . Region::decode($model, "uz");
$this->params['breadcrumbs'][] = ['label' => 'Regions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => Region::decode($model, "uz"), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="region-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
