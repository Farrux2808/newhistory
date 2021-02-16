<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Faxriylar */

$this->title = 'Update Faxriylar: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Faxriylars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="faxriylar-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
