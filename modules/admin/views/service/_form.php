<?php
use app\modules\admin\models\Region;
use app\models\Service;
use app\models\Category;
use kartik\file\FileInput;
use kartik\select2\Select2;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Service */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="service-form">

<?php $form = ActiveForm::begin(); ?>

    <div class="alert alert-warning">
        <a target="_blank" href="https://www.mapcoordinates.net/ru">Ссылка</a> для определения широту и долготу
    </div>

    <div class="box box-success">
        <div class="box-header"></div>

        <div class="box-body">
           
                <div class="row">                
                    <div class="col-md-6">
                     <?= $form->field($model, 'Category_id')->widget(Select2::classname(), [
                            'data' => Region::decodeArray(ArrayHelper::map(Category::find()->all(), 'id', 'name'),"uz"),
                            'language' => 'ru',
                            'options' => ['placeholder' => 'Выбрать'],
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
                <div class="col-md-4">
                        <?= $form->field($model, 'phone')->textInput() ?>   
                </div>
                <div class="col-md-4">
                        <?= $form->field($model, 'lat')->textInput() ?>   
                </div>
                <div class="col-md-4">
                     <?= $form->field($model, 'long')->textInput() ?>
                </div>
                <div class="col-md-4">
                   <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'isActive')->dropDownList(['1' => 'On', '0' => 'Off',]) ?>
                </div>
                <div class="col-md-4">
                     <?= $form->field($model, 'saleInfo')->textInput(['maxlength' => true]) ?>
                </div>
               
        </div>
        <br>
          <div class="nav-tabs-custom mt-3">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#uz" data-toggle="tab" aria-expanded="false">UZ</a></li>
                        <li class=""><a href="#ru" data-toggle="tab" aria-expanded="false">RU</a></li>
                        <li class=""><a href="#en" data-toggle="tab" aria-expanded="false">EN</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="uz">
                            <?= $form->field($model, 'name_uz')->textInput(['value' =>Region::decode($model, "uz") ]) ?>
                            <?= $form->field($model, 'address_uz')->textInput(['value' =>Region::decode($model, "uz") ]) ?>
                            <?= $form->field($model, 'info_uz')->widget(CKEditor::className(), [
                                    'editorOptions' => ElFinder::ckeditorOptions('elfinder', []),
                                ]); ?>
                        </div>

                        <div class="tab-pane" id="ru">
                           <?= $form->field($model, 'name_ru')->textInput(['value' =>Region::decode($model, "ru") ]) ?>
                            <?= $form->field($model, 'address_ru')->textInput(['value' =>Region::decode($model, "ru") ]) ?>
                            <?= $form->field($model, 'info_ru')->widget(CKEditor::className(), [
                                    'editorOptions' => ElFinder::ckeditorOptions('elfinder', []),
                                ]); ?>
                        </div>
                        <div class="tab-pane" id="en">
                           <?= $form->field($model, 'name_en')->textInput(['value' =>Region::decode($model, "en") ]) ?>
                            <?= $form->field($model, 'address_en')->textInput(['value' =>Region::decode($model, "en") ]) ?>
                            <?= $form->field($model, 'info_en')->widget(CKEditor::className(), [
                                    'editorOptions' => ElFinder::ckeditorOptions('elfinder', []),
                                ]); ?>
                        </div>
                    </div>
              </div>

<div class="form-group col-md-12">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
    </div>
<?php ActiveForm::end(); ?>

</div>
