<?php
use app\modules\admin\models\Region;
use app\models\Category;
use kartik\file\FileInput;
use kartik\select2\Select2;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>
       <div class="nav-tabs-custom mt-3">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#uz" data-toggle="tab" aria-expanded="false">UZ</a></li>
                    <li class=""><a href="#ru" data-toggle="tab" aria-expanded="false">RU</a></li>
                      <li class=""><a href="#en" data-toggle="tab" aria-expanded="false">EN</a></li>
                </ul>
            <?php if(!empty($model->name)) : ?>
                <div class="tab-content">
                    <div class="tab-pane active" id="uz">
                        <?= $form->field($model, 'languz')->textInput(['value' => Region::decode($model, "uz")]) ?>

                    </div>

                    <div class="tab-pane" id="ru">
                        <?= $form->field($model, 'langru')->textInput(['value' => Region::decode($model, "ru")]) ?>

                    </div>
                    <div class="tab-pane" id="en">
                        <?= $form->field($model, 'langen')->textInput(['value' => Region::decode($model, "en")]) ?>

                    </div>
                </div>
            <?php else: ?>
                <div class="tab-content">
                    <div class="tab-pane active" id="uz">
                        <?= $form->field($model, 'languz')->textInput(['maxlength' => true]) ?>

                    </div>

                    <div class="tab-pane" id="ru">
                        <?= $form->field($model, 'langru')->textInput(['maxlength' => true])  ?>

                    </div>
                     <div class="tab-pane" id="en">
                        <?= $form->field($model, 'langen')->textInput(['maxlength' => true])  ?>

                    </div>
                </div>
            <?php endif; ?>

    </div>
    <?= $form->field($model, 'file')->widget(FileInput::classname(), [
                        'pluginOptions' => [
                            'showPreview' => false,
                            'showCaption' => true,
                            'showRemove' => true,
                            'showUpload' => false
                        ],
                        //'options' => ['accept' => 'image/*'],
                    ]); ?>
    <?= $form->field($model, 'parent_id')->widget(Select2::classname(), [
                            'data' =>Category::decodeArray(ArrayHelper::map(Category::find()->all(), 'id', 'name'), "uz"),
                            'language' => 'ru',
                            'options' => ['placeholder' => 'Выбрать'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]) ?> 
                         <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success form-control']) ?> 

    <?php ActiveForm::end(); ?>

</div>
