<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Slider */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slider-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
<!--            --><?//= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'file_ru')->widget(FileInput::classname(), [
                'pluginOptions' => [
                    'showPreview' => true,
                    'showCaption' => true,
                    'showRemove' => true,
                    'showUpload' => false,
                    'initialPreview' => ['/'.$model->image_ru],
                    'initialPreviewAsData'=>true,
                ],
                'options' => ['accept' => 'image/*'],
            ]); ?>
        </div>
        <div class="col-md-6">
<!--            --><?//= $form->field($model, 'title_uz')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'file_uz')->widget(FileInput::classname(), [
                'pluginOptions' => [
                    'showPreview' => true,
                    'showCaption' => true,
                    'showRemove' => true,
                    'showUpload' => false,
                    'initialPreview' => ['/'.$model->image_uz],
                    'initialPreviewAsData'=>true,
                ],
                'options' => ['accept' => 'image/*'],
            ]); ?>
        </div>
    </div>

    <?= $form->field($model, 'state')->dropDownList([ 'off' => 'Off', 'on' => 'On']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
