<?php
/**
 * Created by PhpStorm.
 * User: Umar
 * Date: 11.02.2019
 * Time: 9:26
 */
use app\models\Service;
$lang = Yii::$app->language;
$this->title = Service::decode($partner->name, $lang);
?>


<section class="section" id="map" style="box-shadow: -1px 1px 10px 0px #9c9999; height: 400px;">

</section>
<section class="section section-md">
    <div class="container">
        <div class="row row-50">
            <div class="col-lg-12">
                <div class="layout-info">
                    <div class="layout-info-main">
                        <article class="company-light">
                            <figure class="company-light-logo"><img class="company-light-logo-image" src="/<?= Service::rasmLar($partner->id)->image ?>" alt="" />
                            </figure>
                            <div class="company-light-main">
                                <h5 class="company-light-title"><?= Service::decode($partner->name, $lang) ?></h5>
                                <p><?= Service::decode($partner->address, $lang) ?></p>
                            </div>
                        </article>
                    </div>
                    <div class="layout-info-aside">
                        <div class="layout-info-aside-item">
                            <!-- uSocial -->
                            <script async src="https://usocial.pro/usocial/usocial.js?v=6.1.4" data-script="usocial" charset="utf-8"></script>
                            <div class="uSocial-Share" data-pid="3c33d57de796c1b1990e54e9929b56bf" data-type="share" data-options="round-rect,style1,default,absolute,horizontal,size32,eachCounter1,counter1,counter-after" data-social="fb,ok,telegram" data-mobile="wa,sms"></div>

                        </div>
                    
                    </div>
                </div>
                <h4 class="heading-decorated_1"><?= Yii::t('app', 'Полная информация') ?>   </h4>

                <?= Service::decode($partner->info, $lang) ?>
            </div>
        </div>
    </div>
</section>
<script src="https://api-maps.yandex.ru/2.1/?apikey=1a31bb19-b3c6-4d20-9470-c3e8b5da7b1b&lang=ru_RU" type="text/javascript">
</script>
<!---->


