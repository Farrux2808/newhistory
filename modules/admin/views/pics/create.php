<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ServiceImages */

$this->title = 'Create Service Images';
$this->params['breadcrumbs'][] = ['label' => 'Service Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-images-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
