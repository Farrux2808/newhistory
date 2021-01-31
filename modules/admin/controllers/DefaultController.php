<?php

namespace app\modules\admin\controllers;
use app\models\Admin;
use app\models\AdminLoginForm;
use yii\web\Controller;
use Yii;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\VerbFilter;
/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
    public function actions()
    {
		
        return [
            'error' => [
				'class' => 'yii\web\ErrorAction',
				'layout'=>'error',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['index']);
        }

        $model = new AdminLoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
			
            return $this->redirect(['index']);
        }
		

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }
     public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect(['index']);
       // return $this->goHome();
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}
