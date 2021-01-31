<?php

namespace app\modules\admin;
use yii\filters\AccessControl;
use Yii;
/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        Yii::$app->setComponents([
            'user' => [
                'class' => '\yii\web\User',
                'idParam' => '__id'.$this->id,
                'identityClass' => 'app\models\Admin',
                'authTimeoutParam' => '__expire'.$this->id,
                'returnUrlParam' => '__returnUrl'.$this->id,
                'loginUrl' => ["{$this->id}/default/login/"],
            ]
        ]);
    }
   
}
