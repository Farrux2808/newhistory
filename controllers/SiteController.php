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
        $categories = \app\models\Category::find()->all();
        $regions = Region::find()->all();
        $slides = Images::find()->where(['status' => '1'])->all();

        return $this->render('index', [
            'categories' => $categories,
            'regions' => $regions,
            'slides' => $slides
        ]);
    }

    public function actionCategory($id)
    {
        $model=Category::find()->where(['id'=>$id])->one();
        $regions = Region::find()->all();
        $categories=Category::find()->all();
        $partners=Service::find()->where(['category_id'=>$id])->all();
        $dataProvider = new ActiveDataProvider([
            'query' => $partners,
            'pagination' => array('pageSize' => 9),
        ]);
        return $this->render('category',
            [
                'model'=>$model,
                'regions'=>$regions,
                'categories'=>$categories,
                'dataProvider'=>$dataProvider,
                'partners'=>$partners,
            ]);
    }


    public function actionSearch()
    {
        if(Yii::$app->request->isPost){

            $post = Yii::$app->request->post();
           // Yii::$app->helper->dump($post);
            if(isset($post['name'])){
                $post['name'] = Html::encode(trim($post['name']));
                $post['region'] = Html::encode(trim((int)$post['region']));
                if(!empty($post['region'])){
                    $query = Service::find()->where(['Region_id' => $post['region'], 'isActive' => '1']);
                }else{
                    $query = Service::find()->where(['isActive' => '1']);
                }
                // $query->andFilterWhere([
                //     'OR',
                //     'partners.name_ru LIKE "%' . $post['name'] . '%" ',
                //     'partners.name_uz LIKE "%' . $post['name'] . '%"'
                // ]);
            }else{

                $post['category'] = Html::encode(trim((int)$post['category']));
                $post['region'] = Html::encode(trim((int)$post['region']));
                if(!empty($post['category']) && empty($post['region'])){
                    $query = Service::find()->where(['Category_id' => $post['category'], 'isActive' => '1']);

                }elseif (empty($post['category']) && !empty($post['region'])){
                    $query = Service::find()->where(['Region_id' => $post['region'], 'isActive' => '1']);
                }elseif (empty($post['category']) && empty($post['region'])){
                    $query = Service::find()->where(['isActive' => '1']);
                }elseif (!empty($post['category']) && !empty($post['region'])){
                    $query = Service::find()->where(['Region_id' => $post['region'], 'Category_id' => $post['category'], 'isActive' => '1']);
                }
            }

            $countQuery = clone $query;
            $pages = new Pagination([
                'totalCount' => $countQuery->count(),
                'defaultPageSize' => '9'
            ]);
            $partners = $countQuery->offset($pages->offset)
                ->limit($pages->limit)
                ->all();

        }
        $regions = Region::find()->all();
        $categories = \app\models\Category::find()->all();
        return $this->render('search', [
            'regions' => $regions,
            'categories' => $categories,
            'partners' => $partners,
            'pages' => $pages,
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

    public function actionPartners(){
        return $this->render('partners');
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
    public function actionContact()
    {
        $post = Yii::$app->request->post();

        $post['name'] = Html::encode(trim($post['name']));
        $post['phone'] = Html::encode(trim($post['phone']));
        $post['message'] = Html::encode(trim($post['message']));

        if (!empty($post['name']) && !empty($post['phone'])) {

            $table = "<table border='1'>";
            $table .= "<tr><td>Имя</td><td>". $post['name'] ."</td></tr>";
            $table .= "<tr><td>Телефон</td><td>". $post['phone'] ."</td></tr>";
            $table .= "<tr><td>Сообшение</td><td>". $post['message'] ."</td></tr>";
            $table .= "</table>";
            $sms = Yii::$app->mailer->compose()
                ->setTo('akmacardsam@gmail.com')
                ->setFrom('no-reply@easybooking.uz')
                ->setSubject('Заявка на Akma Card')
                ->setHtmlBody($table)
                ->send();
            if($sms){
                Yii::$app->session->setFlash('app', 'Ваша заявка принята!');
            }else{
                Yii::$app->session->setFlash('app', 'Произошло ошибка');
            }

        }else{
            Yii::$app->session->setFlash('app', 'Заполните обязательные поля');
        }
        return $this->redirect('/');
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

}
