<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\models\Category;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="page">
    <!-- Page Header-->
    <header class="section page-header">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap rd-navbar-classic-light">
            <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed"
                 data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static"
                 data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static"
                 data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px"
                 data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true"
                 data-xxl-stick-up="true">
                <div class="rd-navbar-main-outer">
                    <div class="rd-navbar-main">
                        <!-- RD Navbar Panel-->
                        <div class="rd-navbar-panel">
                            <!-- RD Navbar Toggle-->
                            <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                            <!-- RD Navbar Brand-->
                            <div class="rd-navbar-brand"><a class="brand" href="<?= Url::to('/') ?>">
                                    <h3> Gumanitar </h3></a>
                            </div>
                        </div>
                        <div class="rd-navbar-main-element">
                            <div class="rd-navbar-nav-wrap">
                                <!-- RD Navbar Nav-->
                                <ul class="rd-navbar-nav">
                                    <div class="dropdown">
                                    <?php
                                        $asosiy = Category::find()->where(['category_id'=>NULL])->all();
                                        foreach($asosiy as $item) {
                                            
                                            ?>
                                            <li class="rd-nav-link"><?= Yii::t('app', $item->category) ?></li>
                                            <div class="dropdown-content">
                                            <?php

                                            $vaqtincha = Category::find()->where(['category_id'=>$item->id])->all();
                                            foreach ($vaqtincha as $value) {
                                            ?>
                                                
                                                <a href="<?= Url::to(['/articles', 'id' => $value->id]) ?>"><?= Yii::t('app', $value->category) ?></a>
                                                
                                            <?php
                                            }
                                            ?>
                                            </div>
                                            <?php
                                        }
                                    ?>
                                    </div>
                                    <!-- <div class="dropdown">
                                        <li class="rd-nav-link"><?= Yii::t('app', 'Disertatsiya') ?></li>
                                        <div class="dropdown-content">
                                            <a href="<?= Url::to(['/articles', 'id' => 1]) ?>"><?= Yii::t('app', 'diniy') ?></a>
                                            <a href="<?= Url::to(['/articles', 'id' => 1]) ?>"><?= Yii::t('app', 'badiy') ?></a>
                                            <a href="<?= Url::to(['/articles', 'id' => 1]) ?>"><?= Yii::t('app', 'ilmiy') ?></a>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <li class="rd-nav-link"><?= Yii::t('app', 'Maqolalar') ?></li>
                                        <div class="dropdown-content">
                                        <a href="#"><?= Yii::t('app', 'diniy') ?></a>
                                            <a href="#"><?= Yii::t('app', 'badiy') ?></a>
                                            <a href="#"><?= Yii::t('app', 'ilmiy') ?></a>
                                        </div>
                                    </div> -->
                                    <!-- <li class="rd-nav-item">
                                        <a class="rd-nav-link" href="<?= Url::to([Yii::$app->request->pathInfo, 'language' => 'ru']) ?>">RU</a>/
                                        <a class="rd-nav-link" href="<?= Url::to([Yii::$app->request->pathInfo, 'language' => 'uz']) ?>">UZ</a>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
        <?= $content ?>
    <!-- Page Footer-->
    <footer class="section footer-modern context-dark">
        <div class="footer-modern-main">
            <div class="container">
                <div class="row row-50 justify-content-lg-between">
                    <div class="col-lg-5">
                        <p class="footer-modern-title"><?= Yii::t('app', 'Контакты') ?></p>
                        <div class="footer-modern-divider"></div>
                        <p class="text-width-small">
                        <ul class="list-marked-1">
                            <li><a href="tel:+998939999047">+998 93 999 90 47</a></li>
                            <li><a href="tel:+998995948696">+998 99 594 86 96</a></li>
                            <li><span> <?= Yii::t('app', 'Samarqand vil. ') ?></span></li>
                        </ul>
                        </p>


                    </div>
                    <!-- <div class="col-sm-6 col-lg-3">
                        <p class="footer-modern-title"><?= Yii::t('app', 'Клиентам') ?></p>
                        <div class="footer-modern-divider"></div>
                        <ul class="list-marked-1">
                            <li><a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"><?= Yii::t('app', 'Заказать карту') ?></a></li>
                            <li><a href="<?= Url::to(['site/about']) ?>"><?= Yii::t('app', 'О нас') ?></a></li>
                            <li><a href="<?= Url::to(['site/map']) ?>"><?= Yii::t('app', 'Карта <span>Akma card</span>') ?></a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <p class="footer-modern-title"><?= Yii::t('app', 'Партнерам') ?></p>
                        <div class="footer-modern-divider"></div>
                        <ul class="list-marked-1">
                            <li><a href="<?= Url::to(['site/partners']) ?>"><?= Yii::t('app', 'Стать партнерам') ?></a></li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>



        <div class="footer-modern-aside p-2">
            <div class="container">
                <div class="footer-modern-aside-inner">
                    <div class="footer-modern-aside-item mt-2">
                        <p class="rights"><span>Humanitar</span><span>&nbsp;&copy;&nbsp;</span><span class="copyright-year"></span><span>&nbsp;</span></p>
                    </div>
                    <div class="footer-modern-aside-item mt-2">
                        <ul class="list-inline list-inline-sm">
                            <li><a target="_blank" class="icon icon-xs fa fa-facebook" href="https://www.facebook.co"></a></li>
                            <li><a target="_blank" class="icon icon-xs fa fa-odnoklassniki" href="https://ok.ru"></a></li>
                            <li><a target="_blank" class="icon icon-xs fa fa-instagram" href="https://www.instagram.com"></a></li>
                            <li><a target="_blank" class="icon icon-xs fa fa-instagram" href="https://www.instagram.com"></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </footer>
</div>
<div class="snackbars" id="form-output-global"></div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?= Yii::t('app', 'Заказать карту') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php $form = \yii\widgets\ActiveForm::begin([
                    'action' => Url::to(['site/contact'])
            ]) ?>
            <div class="modal-body">


                <div class="form-wrap form-wrap-icon">
                    <input class="form-control rounded-0" placeholder="<?= Yii::t('app', 'Имя') ?>" id="form-name" type="text" name="name" data-constraints="@Required">
                </div>

                <div class="form-wrap form-wrap-icon">
                    <input class="form-control rounded-0" placeholder="<?= Yii::t('app', 'Номер телефона') ?>" id="form-phone" type="text" name="phone" data-constraints="@Required">
                </div>

                <div class="form-wrap form-wrap-icon">
                    <textarea class="form-control" placeholder="<?= Yii::t('app', 'Сообщение') ?>" name="message" id="form-message" rows="6"></textarea>
                </div>


            </div>
            <div class="modal-footer">
                <button type="submit" class="button button-sm button-default"><?= Yii::t('app', 'Отправить') ?></button>
            </div>
            <?php \yii\widgets\ActiveForm::end() ?>
        </div>
    </div>
</div>
<style>
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
  margin-right: 20px;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>
<?php if (Yii::$app->session->hasFlash('app')): ?>

    <script>alert('<?= Yii::$app->session->get('app') ?>')</script>

<?php endif; ?>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
