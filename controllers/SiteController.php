<?php

namespace app\controllers;
use Yii;
use DateTime;
use app\modules\admin\models\Images;
use app\modules\admin\models\Region;
use app\models\Category;
use app\models\Service;
use app\models\ServiceImages;
use app\models\Users;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index', [
        ]);
    }

    public function actionView()
    {
        $get = Yii::$app->request->get();

       // $get['alias'] = Html::encode(trim($get['alias']));
        $get['id'] = Html::encode(trim((int)$get['id']));

        $partner = Service::find()->where(['id' => $get['id'], 'isActive' => '1'])->one();

        return $this->render('view',[
            'partner' => $partner,
        ]);
    }
   
    public function actionMap()
    {
        return $this->render('map');
    }

    public function sendMail($email) {
        $result = \Yii::$app->mailer->compose()->setTo($email)
            ->setFrom('no-reply@easybooking.uz')
            ->setSubject('EasyBooking.uz')
            ->send();
        \Yii::$app->mailer->getView()->params = null;

        return $result;
    }
    public function actionParams()
    {
        $models = Service::find()->where(['isActive' => '1'])->all();
        $params = [];
        $k = 0;
        foreach ($models as $model){
            $params[$k][] = $model->name;
            $params[$k][] = $model->lat;
            $params[$k][] = $model->lng;
            $params[$k][] = $model->image;
            $k++;
            if($model->getItems()->count()){
                foreach ($model->items as $item) {
                    $params[$k][] = $model->name;
                    $params[$k][] = $item->lat;
                    $params[$k][] = $item->lng;
                    $params[$k][] = $model->image;
                    $k++;
                }
            }

        }

//        Yii::$app->helper->dump(json_encode($params, JSON_UNESCAPED_UNICODE));

        return json_encode($params, JSON_UNESCAPED_UNICODE);
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionArticle()
    {
        return $this->render('article');
    }
    public function actionArticles()
    {
        return $this->render('articles');
    }

}
