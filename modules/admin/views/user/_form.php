<?php
use app\modules\admin\models\Region;
use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-md-6">
         <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-6">
         <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
    </div>
</div>
<div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
        </div>
         <div class="col-md-6">
            <?= $form->field($model, 'job')->textInput(['maxlength' => true]) ?>
        </div>
</div>
<div class="row">
        <div class="col-md-6">
           <?= $form->field($model, 'isAdmin')->widget(Select2::classname(), [
                'data' => [
                        '0' => 'Пользователь',
                        '2' => 'Модератор',
                        '1' => 'Админ',
                ],
                'language' => 'ru',
                'options' => ['placeholder' => 'Выберите роль'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'verified')->dropDownList(['1' => 'Yes', '0' => 'No',]) ?>
        </div>
         <div class="col-md-6">
            <?= $form->field($model, 'gender')->widget(Select2::classname(), [
                'data' => [
                        '0' => 'Female',
                        '1' => 'Male',
                ],
                'language' => 'ru',
                'options' => ['placeholder' => 'Выберите поль'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'Region_id')->widget(Select2::classname(), [
                'data' =>Region::decodeArray( ArrayHelper::map(\app\models\Region::find()->all(), 'id', 'name'), "uz"),
                'language' => 'ru',
                'options' => ['placeholder' => 'Выбрать'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>
       </div>
</div>

   

   

    

   

   

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
