<?php
use app\modules\admin\models\Region;
use app\models\Service;
use kartik\file\FileInput;
use kartik\select2\Select2;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\ServiceImages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="service-images-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
    <div class="col-md-6">
        <?= $form->field($model, 'file')->widget(FileInput::classname(), [
                        'pluginOptions' => [
                            'showPreview' => false,
                            'showCaption' => true,
                            'showRemove' => true,
                            'showUpload' => false
                        ],
                        //'options' => ['accept' => 'image/*'],
        ]); ?>
    </div>
    <div class="col-md-6">
	  <?= $form->field($model, 'isLogo')->dropDownList(['1' => 'Yes', '0' => 'No',]) ?>
    </div>
    <div class="col-md-12">
    	<?= $form->field($model, 'Service_id')->widget(Select2::classname(), [
                        'data' => Region::decodeArray(ArrayHelper::map(Service::find()->all(), 'id', 'name'),"uz"),
                        'language' => 'ru',
                        'options' => ['placeholder' => 'Выбрать'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
        ]) ?>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
