<?php
use app\modules\admin\models\GiftItems;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\GiftItems */

$this->title = 'Update Gift Items: ' . GiftItems::decode($model, "uz");
$this->params['breadcrumbs'][] = ['label' => 'Gift Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => GiftItems::decode($model, "uz"), 'url' => ['view', 'id' => $model->id, 'Service_id' => $model->Service_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gift-items-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
