<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\GiftItems */

$this->title = 'Create Gift Items';
$this->params['breadcrumbs'][] = ['label' => 'Gift Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gift-items-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
