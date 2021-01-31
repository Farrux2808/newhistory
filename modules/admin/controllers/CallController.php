<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\CallCenter;
use app\modules\admin\models\Activity;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\VerbFilter;
/**
 * CallController implements the CRUD actions for CallCenter model.
 */
class CallController extends Controller
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
     * Lists all CallCenter models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => CallCenter::find(),
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CallCenter model.
     * @param integer $id
     * @param integer $Region_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $Region_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $Region_id),
        ]);
    }

    /**
     * Creates a new CallCenter model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CallCenter();
       
        if ($model->load(Yii::$app->request->post()) &&  $model->save()) {
           
            $add= new Activity;
            $add->addAct("create", "CallCenter", $model->id, $model->Region_id); //activity

            return $this->redirect(['view', 'id' => $model->id, 'Region_id' => $model->Region_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CallCenter model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $Region_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $Region_id)
    {
        $model = $this->findModel($id, $Region_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $add= new Activity;
            $add->addAct("update", "CallCenter", $model->id, $model->Region_id); //activity

            return $this->redirect(['view', 'id' => $model->id, 'Region_id' => $model->Region_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CallCenter model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $Region_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $Region_id)
    {
        $add= new Activity;
        $add->addAct("delete", "CallCenter", $id, $Region_id); //activity
        $this->findModel($id, $Region_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CallCenter model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $Region_id
     * @return CallCenter the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $Region_id)
    {
        if (($model = CallCenter::findOne(['id' => $id, 'Region_id' => $Region_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
