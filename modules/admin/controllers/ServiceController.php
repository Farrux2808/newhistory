<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Service;
use app\modules\admin\models\Activity;
use app\modules\admin\models\Visits;
use app\modules\admin\models\Outgoings;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ServiceController implements the CRUD actions for Service model.
 */
class ServiceController extends Controller
{
    /**
     * {@inheritdoc}
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
            
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Service models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Service::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Service model.
     * @param integer $id
     * @param integer $Category_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $Category_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $Category_id),
        ]);
    }

    /**
     * Creates a new Service model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Service();

        if ($model->load(Yii::$app->request->post()) && $model->mulname($model) && $model->addPass($model->password)) {
            $model->save();
            $add= new Activity;
            $add->addAct("create", "Service", $model->id, $model->Region_id); //activity
            return $this->redirect(['view', 'id' => $model->id, 'Category_id' => $model->Category_id]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Service model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $Category_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $Category_id)
    {
        $model = $this->findModel($id, $Category_id);
        $model->info_uz=Service::decode($model->info, "uz");
        $model->info_ru=Service::decode($model->info, "ru");
        $model->info_en=Service::decode($model->info, "en");
        $model->password="";
        if ($model->load(Yii::$app->request->post())  && $model->mulname($model) && $model->addPass($model->password)) {
            $model->save();
            $add= new Activity;
            $add->addAct("update", "Service", $id, $model->Region_id); //activity
            return $this->redirect(['view', 'id' => $model->id, 'Category_id' => $model->Category_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Service model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $Category_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $Category_id)
    {
        $model = $this->findModel($id, $Category_id);
        $add= new Activity;
        $add->addAct("delete", "Service", $id, $model->Region_id); //activity

        $this->findModel($id, $Category_id)->delete();

        return $this->redirect(['index']);
    }
    public function actionShow($id)
    {
        $model1 = Outgoings::find(['Service_id' => $id]);
        $model = $this->findMode($id);
        $dataProvider = new ActiveDataProvider([
            'query' => $model,
        ]);
        $dataProvider1 = new ActiveDataProvider([
            'query' => $model1,
        ]);
        return $this->render('show', [
            'dataProvider' => $dataProvider,
            'dataProvider1'=>$dataProvider1,
        ]);
    }

    /**
     * Finds the Service model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $Category_id
     * @return Service the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $Category_id)
    {
        if (($model = Service::findOne(['id' => $id, 'Category_id' => $Category_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    protected function findMode($id)
    {
        if (($model = Visits::find(['Service_id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
