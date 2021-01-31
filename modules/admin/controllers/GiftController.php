<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\GiftItems;
use app\modules\admin\models\Activity;
use app\models\Service;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\VerbFilter;

/**
 * GiftController implements the CRUD actions for GiftItems model.
 */
class GiftController extends Controller
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
     * Lists all GiftItems models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => GiftItems::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GiftItems model.
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
     * Creates a new GiftItems model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GiftItems();
       
        if ($model->load(Yii::$app->request->post()) && $model->mulname($model)) {
            $model->save();
            
            $region=new Service;
            $add= new Activity;
            $regionId=$region->findOne(['id'=>$model->Service_id]);
            $add->addAct("create", "GiftItems", $model->id, $regionId->Region_id); //activity
            
            return $this->redirect(['view', 'id' => $model->id, 'Service_id' => $model->Service_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing GiftItems model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $Service_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $Service_id)
    {
        $model = $this->findModel($id, $Service_id);

        if ($model->load(Yii::$app->request->post()) && $model->mulname($model)) {
            $model->save();
            
            $region=new Service;
            $add= new Activity;
            $regionId=$region->findOne(['id'=>$model->Service_id]);
            $add->addAct("update", "GiftItems", $model->id, $regionId->Region_id); //activity
            
            return $this->redirect(['view', 'id' => $model->id, 'Service_id' => $model->Service_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing GiftItems model.
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
        $add->addAct("delete", "GiftItems", $id, $regionId->Region_id); //activity
        $this->findModel($id, $Service_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the GiftItems model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $Service_id
     * @return GiftItems the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $Service_id)
    {
        if (($model = GiftItems::findOne(['id' => $id, 'Service_id' => $Service_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
