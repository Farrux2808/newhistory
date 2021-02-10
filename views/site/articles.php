<?php
$lang = Yii::$app->language;
$this->title = 'Humanitar';
use app\models\Service;
use yii\widgets\ActiveForm; 
?>
<div class="site-index">
    <div class="card" style="margin: 100px 30px 100px 30px">
        <div class="card-header">
            Oxirgi qo'shilganlar
        </div>
        <?php
            $articles = array('maqola nomi','maqola nomi','maqola nomi');
            foreach ($articles as $article) {
            ?>
        <div class="row" style="padding: 5px">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">dfgdsfg gsdf gsdfg sdfg sdfg sdfgsdfgdfgsdfgsdfgsdfgsdfgsd ssdf gsdfgsd fgsdfd</h5>
                        <div class="row" style="padding: 0px 10px 20px 20px">
                            <p class="card-text">avtor</p>
                            <a href="#" class="btn btn-primary" style=" position: absolute; right: 20px;">batafsil</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">dfgdsfg gsdf gsdfg sdfg sdfg sdfgsdfgdfgsdfgsdfgsdfgsdfgsd ssdf gsdfgsd fgsdfd</h5>
                        <div class="row" style="padding: 0px 10px 20px 20px">
                            <p class="card-text">avtor</p>
                            <a href="#" class="btn btn-primary" style=" position: absolute; right: 20px;">batafsil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
</div>