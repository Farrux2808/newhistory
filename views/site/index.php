<?php
$lang = Yii::$app->language;
$this->title = 'Gumanitar';
use app\models\Service;
use app\models\Articles;
use app\models\Faxriylar;
use yii\widgets\ActiveForm; 
?>
<div class="site-index">
    <br><br><br>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block w-100" src="/web/img/1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="/web/img/1.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="/web/img/1.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="card" style="margin: 100px 30px 100px 30px">
        <div class="card-header">
            Oxirgi qo'shilganlar
        </div>
        <?php
            $articles = Articles::find()->limit(6)->all();
            foreach ($articles as $article) {
            ?>
        <div class="row" style="padding: 5px">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?=$article->title?></h5>
                        <div class="row" style="padding: 0px 10px 20px 20px">
                            <p class="card-text"><?php $article->avtor?></p>
                            <a href="#" class="btn btn-primary" style=" position: absolute; right: 20px;">batafsil</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?=$article?></h5>
                        <div class="row" style="padding: 0px 10px 20px 20px">
                            <p class="card-text">avtor</p>
                            <a href="#" class="btn btn-primary" style=" position: absolute; right: 20px;">batafsil</a>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
        <?php
            }
        ?>
    </div>
    <div class="card" style="margin: 100px 30px 100px 30px">
        <div class="card-header">
            Faxriylar
        </div>
        <?php
            $veterans = Faxriylar::find()->all();
            foreach ($veterans as $veteran) {
            ?>
        <div class="card-deck" style="padding: 5px">
            <div class="card">
                <img src="/web/img/2.jpeg" alt="Avatar" class="avatar center">
                <div class="card-body">
                <h5 class="card-title center"><?php $veteran->fio?></h5>
                </div>
            </div>
            <!-- <div class="card">
                <img src="/web/img/2.jpeg" alt="Avatar" class="avatar center">
                <div class="card-body">
                <h5 class="card-title center">Card title</h5>
                </div>
            </div>
            <div class="card">
                <img src="/web/img/2.jpeg" alt="Avatar" class="avatar center">
                <div class="card-body">
                <h5 class="card-title center">Card title</h5>
                </div>
            </div> -->
        </div>
        <?php
            }
        ?>
    </div>
</div>
<style>
    .avatar {
        vertical-align: middle;
        width: 250px;
        height: 250px;
        border-radius: 50%;
    }
    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
</style>