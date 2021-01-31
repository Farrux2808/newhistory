<?php

use app\modules\admin\models\Region;
use kartik\file\FileInput;
use kartik\select2\Select2;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\CallCenter */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="call-center-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'phone')->textInput()?>

    <?= $form->field($model, 'Region_id')->widget(Select2::classname(), [
                        'data' => Region::decodeArray(ArrayHelper::map(Region::find()->all(), 'id', 'name'), "uz"),
                        'language' => 'ru',
                        'options' => ['placeholder' => 'Выбрать'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
