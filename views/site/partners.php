<?php
/**
 * Created by PhpStorm.
 * User: Umar
 * Date: 05.07.2019
 * Time: 10:29
 */

use yii\helpers\Url; ?>

<div class="partners-page">
    <div class="partners-page-inner">
        <div class="container">
            <div class="partners-content">
                <h1>Предложение для партнеров</h1>
                <p>
                    Присоединяйтесь к клубу и получайте:
                    <ul>
                        <li>- доступ к базе сотен потенциальных клиентов</li>
                        <li>- рекламу и продвижение ваших товаров и услуг</li>
                        <li>- информационную поддержку</li>
                        <li>- контакты членов клуба для рассылки</li>
                        <li>- увеличение потока клиентов</li>
                    </ul>
                </p>

                <div class="partners-buttons">
                    <a href="#" class="button button-lg button-primary">Подробнее об условиях</a>
                    <button type="button" data-toggle="modal" data-target="#partnersModal" class="button button-lg button-default-outline">Стать партнером Клуба</button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="partnersModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?= Yii::t('app', 'Стать партнерам') ?></h5>
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
