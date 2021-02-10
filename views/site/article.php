<?php
$lang = Yii::$app->language;
$this->title = 'Humanitar';
use app\models\Service;
use yii\widgets\ActiveForm; 
?>
<div class="site-index">
    <div class="card text-center" style="margin: 100px 30px 100px 30px;">
        <div class="card-header">
            <h3>maqola nomi</h3>
        </div>
        <div class="card-body">
            <p class="card-text">avtor</p>
            <a href="#" style="color: blue">to'liq tanishish</a>
        </div>
    </div>
    <div class="card" style="margin: 100px 30px 100px 30px;">
        <div class="card-header">
            Sharhlar
        </div>

        <div style="margin-bottom: 20px">
            <div class="row" style="padding: 10px 10px 0px 10px; margin: 0px">
                <div class="col-sm-2">
                    <img src="/web/img/avatar.png" alt="Avatar" class="avatar">
                </div>
                <div class="col-sm-10">
                    <div class="chat" style="padding: 10px">
                        <h6>maqola yaxshi chiqibdi gap yo'q</h6>
                    </div>
                </div>
            </div>
            <div class="row" style="padding: 0px 10px 0px 10px; margin: 0px">
                <div class="col-sm-2 text-center">
                    user name
                </div>
                <div class="col-sm-10 text-right">
                    10.02.2021
                </div>
            </div>
        </div>
        <div style="margin-bottom: 20px">
            <div class="row" style="padding: 10px 10px 0px 10px; margin: 0px">
                <div class="col-sm-2">
                    <img src="/web/img/avatar.png" alt="Avatar" class="avatar">
                </div>
                <div class="col-sm-10">
                    <div class="chat" style="padding: 10px">
                        <h6>maqola yaxshi chiqibdi gap yo'q</h6>
                    </div>
                </div>
            </div>
            <div class="row" style="padding: 0px 10px 0px 10px; margin: 0px">
                <div class="col-sm-2 text-center">
                    user name
                </div>
                <div class="col-sm-10 text-right">
                    10.02.2021
                </div>
            </div>
        </div>
        
        <div class="input-group mb-3" style="padding: 10px 10px 0px 10px; margin: 0px">
            <input type="text" class="form-control" placeholder="Sharh qoldirsh" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button">Jo'natish</button>
            </div>
        </div>
    </div>
</div>
<style>
    .avatar {
        vertical-align: middle;
        border-radius: 50%;
    }
    .chat {
        width: 100%;
        height: 100%;
        background-color: #BBBBBB;
    }
</style>