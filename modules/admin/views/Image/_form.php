<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use kartik\checkbox\CheckboxX;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Images */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="images-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-4">
            <?= $form->field($model, 'file_uz')->widget(FileInput::classname(), [
                'pluginOptions' => [
                    'showPreview' => true,
                    'showCaption' => true,
                    'showRemove' => true,
                    'showUpload' => false,
                    'initialPreview' => ['/'.$model->file_uz],
                    'initialPreviewAsData'=>true,
                ],
                'options' => ['accept' => 'image/*'],
            ]); ?>
    </div>
    <div class="col-md-4">
            <?= $form->field($model, 'file_ru')->widget(FileInput::classname(), [
                'pluginOptions' => [
                    'showPreview' => true,
                    'showCaption' => true,
                    'showRemove' => true,
                    'showUpload' => false,
                    'initialPreview' => ['/'.$model->file_ru],
                    'initialPreviewAsData'=>true,
                ],
                'options' => ['accept' => 'image/*'],
            ]); ?>
    </div>
    <div class="col-md-4">
            <?= $form->field($model, 'file_en')->widget(FileInput::classname(), [
                'pluginOptions' => [
                    'showPreview' => true,
                    'showCaption' => true,
                    'showRemove' => true,
                    'showUpload' => false,
                    'initialPreview' => ['/'.$model->file_en],
                    'initialPreviewAsData'=>true,
                ],
                'options' => ['accept' => 'image/*'],
            ]); ?>
    </div>

    <?= $form->field($model, 'isAdvertisement')->checkBox(['label' => 'isAdvertisement','data-size'=>'small', 'class'=>'bs_switch','style'=>'margin-bottom:4px;', 'id'=>'isAdvertisement']) ?>

 
    <?= $form->field($model, 'status')->dropDownList([ '0' => 'Off', '1' => 'On']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
