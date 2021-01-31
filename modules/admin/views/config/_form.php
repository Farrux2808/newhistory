<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use app\modules\admin\models\ConFig;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Config */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="config-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="nav-tabs-custom mt-3">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#uz" data-toggle="tab" aria-expanded="false">UZ</a></li>
            <li class=""><a href="#ru" data-toggle="tab" aria-expanded="false">RU</a></li>
            <li class=""><a href="#en" data-toggle="tab" aria-expanded="false">EN</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="uz">         
                <?= $form->field($model, 'info_uz')->widget(CKEditor::className(), [
                    'editorOptions' => ElFinder::ckeditorOptions('elfinder', []),]); ?>
            </div>
            <div class="tab-pane" id="ru">
                <?= $form->field($model, 'info_ru')->widget(CKEditor::className(), [
                    'editorOptions' => ElFinder::ckeditorOptions('elfinder', []),]); ?>
            </div>
            <div class="tab-pane" id="en">
                <?= $form->field($model, 'info_en')->widget(CKEditor::className(), [
                    'editorOptions' => ElFinder::ckeditorOptions('elfinder', []),]); ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
