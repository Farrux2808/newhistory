<?php
use app\modules\admin\models\GiftItems;
use app\modules\admin\models\Region;
use kartik\file\FileInput;
use kartik\select2\Select2;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="gift-items-form">
    <?php $form = ActiveForm::begin(); ?>
    <br>
    <div class="nav-tabs-custom mt-3">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#uz" data-toggle="tab" aria-expanded="false">UZ</a></li>
                <li class=""><a href="#ru" data-toggle="tab" aria-expanded="false">RU</a></li>
                <li class=""><a href="#en" data-toggle="tab" aria-expanded="false">EN</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="uz">
                    <?= $form->field($model, 'name_uz')->textInput(['value' =>GiftItems::decode($model, 'uz') ]) ?>
                </div>
                <div class="tab-pane" id="ru">
                    <?= $form->field($model, 'name_ru')->textInput(['value' =>GiftItems::decode($model, 'ru') ])  ?>
                </div>
                <div class="tab-pane" id="en">
                    <?= $form->field($model, 'name_en')->textInput(['value' =>GiftItems::decode($model, 'en') ]) ?>
                </div>
            </div>
        </div>
    <?= $form->field($model, 'balanceForItem')->textInput() ?>
    <?= $form->field($model, 'Service_id')->widget(Select2::classname(), [
                        'data' => Region::decodeArray( ArrayHelper::map(\app\models\Service::find()->all(), 'id', 'name'), "uz"),
                        'language' => 'ru',
                        'options' => ['placeholder' => 'Выбрать'],
                        'pluginOptions' => ['allowClear' => true],
                    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
