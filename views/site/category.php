<?php

/**
 * Created by PhpStorm.
 * User: Umar
 * Date: 10.02.2019
 * Time: 22:28
 */

$lang = Yii::$app->language;

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\Service;
use app\models\ServiceImages;
use yii\widgets\LinkPager;

?>
<section class="section breadcrumbs-custom breadcrumbs-custom-overlay-2">
    <div class="breadcrumbs-custom-main bg-image bg-gray-700" style="background-image: url('/img/shop6.jpg');">
        <div class="container">
            <h3 class="breadcrumbs-custom-title"><?= Service::decode($model->name, Yii::$app->language) ?></h3>
        </div>
    </div>
</section>
<section class="section section-md">
    <div class="container">
        <?php $form = ActiveForm::begin([
            'action' => Url::to(['site/search']),
            'method' => 'post',
            'options' => [
                'class' => 'form-layout-search form-lg'
            ]
        ]) ?>
            <div class="form-wrap form-wrap-icon">
                <input class="form-input" id="form-name" type="text" name="name" data-constraints="@Required">
                <label class="form-label" for="form-name"><?= Yii::t('app', 'Название') ?></label><span class="icon fl-bigmug-line-search74"></span>
            </div>
            <div class="form-wrap form-wrap-icon form-wrap-select">
                <!-- Select 2-->
                <select class="form-input select" id="form-region" data-placeholder="<?= Yii::t('app', 'Все регионы') ?>" name="region"
                        data-minimum-results-for-search="Infinity" data-constraints="@Selected">
                    <option label="<?= Yii::t('app', 'Все регионы') ?>"></option>
                    <?php foreach ($regions as $region): ?>
                        <option value="<?= $region->id ?>"><?= Service::decode($region->name, Yii::$app->language) ?></option>
                    <?php endforeach; ?>
                </select><span class="icon fl-bigmug-line-big104"></span>
            </div>
            <div class="form-wrap form-wrap-button">
                <button class="button button-lg button-blue-9" type="submit"><?= Yii::t('app', 'Поиск') ?></button>
            </div>
        <?php ActiveForm::end() ?>
        <div class="row row-50 flex-lg-row-reverse">
            <div class="col-lg-4 col-xl-3">
                <div class="row row-30">
                    <div class="col-md-4 col-lg-12">
                        <p class="heading-8"><?= Yii::t('app', 'Категории') ?></p>
                        <hr>
                        <ul class="list-block list-block-2">
                            <?php foreach ($categories as $category) : ?>
                                <li>
                                    <a href="<?= \yii\helpers\Url::to(['site/category', 'id' => $category->id]) ?>">
                                        <span class="list-block-title"><?= Service::decode($category->name, Yii::$app->language) ?></span>
                                    </a>
                                </li>
                            <?php endforeach; ?>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xl-9">
                <div class="row row-40">
                    <?php if(count($partners) > 0):  ?>

                    <?php foreach ($partners as $partner): ?>
    <div class="col-sm-6 col-md-4 col-lg-6 col-xl-4">
        <a class="profile-classic" href="<?= Url::to(['site/view', 'id' => $partner->id]); ?>">
            <figure class="profile-classic-figure" style="background-image: url('/<?= Service::rasmLar($partner->id)->image ?>')">
            </figure>
            <div class="profile-classic-main">
                <h5 class="profile-classic-name"><?= Service::decode($partner->name, Yii::$app->language) ?></h5>
                <ul class="profile-classic-list">
                    <li><span class="icon mdi mdi-map-marker"></span><span><?= Service::decode($region->name, Yii::$app->language) ?></span></li>
                </ul>
            </div>
        </a>
    </div>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <div class="col-md-12">
                            <div class="alert alert-danger">
                                <?= Yii::t('app', 'Этот раздел пуст') ?>
                            </div>
                    </div>
                    <?php endif; ?>
                </div>

               <?php 
                    echo \yii\widgets\LinkPager::widget([
                        'pagination'=>$dataProvider->pagination,
                    ]);
               ?>
            </div>
        </div>
    </div>
</section>
