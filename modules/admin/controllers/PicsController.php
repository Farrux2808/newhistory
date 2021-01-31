<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\ServiceImages;
use app\modules\admin\models\Activity;
use app\models\Service;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;

/**
 * PicsController implements the CRUD actions for ServiceImages model.
 */
class PicsController extends Controller
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
     * Lists all ServiceImages models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ServiceImages::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ServiceImages model.
     * @param integer $id
     * @param integer $Service_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $Service_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $Service_id),
        ]);
    }

    /**
     * Creates a new ServiceImages model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ServiceImages();

         if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->upload();
            $model->save();

            $region=new Service;
            $add= new Activity;
            $regionId=$region->findOne(['id'=>$model->Service_id]);
            $add->addAct("create", "ServiceImages", $model->id, $regionId->Region_id); //activity

            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ServiceImages model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $Service_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $Service_id)
    {
        $model = $this->findModel($id, $Service_id);

        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->upload();
            $model->save();

            $region=new Service;
            $add= new Activity;
            $regionId=$region->findOne(['id'=>$model->Service_id]);
            $add->addAct("update", "ServiceImages", $model->id, $regionId->Region_id); //activity
           
           return $this->redirect(['view', 'id' => $model->id, 'Service_id' => $model->Service_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ServiceImages model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $Service_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $Service_id)
    {
        $region=new Service;
        $add= new Activity;
        $regionId=$region->findOne(['id'=>$Service_id]);
        $add->addAct("delete", "ServiceImages", $id, $regionId->Region_id); //activity

        $this->findModel($id, $Service_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ServiceImages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $Service_id
     * @return ServiceImages the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $Service_id)
    {
        if (($model = ServiceImages::findOne(['id' => $id, 'Service_id' => $Service_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
