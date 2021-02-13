<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Discussin */

$this->title = 'Create Discussin';
$this->params['breadcrumbs'][] = ['label' => 'Discussins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="discussin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
