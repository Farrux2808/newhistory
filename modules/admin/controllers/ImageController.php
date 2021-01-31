<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Images;
use app\modules\admin\models\Activity;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ImageController implements the CRUD actions for Images model.
 */
class ImageController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Images models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Images::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Images model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Images model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Images();

        if ($model->load(Yii::$app->request->post())) {            
            $model->file_ru = UploadedFile::getInstance($model, 'file_ru');
            $model->file_uz = UploadedFile::getInstance($model, 'file_uz');
            $model->file_en = UploadedFile::getInstance($model, 'file_en');
            $model->upload();
            $model->save();
            $add= new Activity;
            $add->addAct("create", "Images", $model->id); //activity
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Images model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->file_uz=Images::decode($model->image, "uz");
        $model->file_ru=Images::decode($model->image, "ru");
        $model->file_en=Images::decode($model->image, "en");

        if ($model->load(Yii::$app->request->post())) {
            $model->file_ru = UploadedFile::getInstance($model, 'file_ru');
            $model->file_uz = UploadedFile::getInstance($model, 'file_uz');
            $model->file_en = UploadedFile::getInstance($model, 'file_en');
            $model->upload();
            $model->save();
            $add= new Activity;
            $add->addAct("update", "Images", $id); //activity
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Images model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->file_uz=Images::decode($model->image, "uz");
        $model->file_ru=Images::decode($model->image, "ru");
        $model->file_en=Images::decode($model->image, "en");
        if (file_exists( $model->file_uz)){
            unlink($model->file_uz);
        }
        if (file_exists($model->file_ru) ){
            unlink($model->file_ru);
        }
        if (file_exists($model->file_en)){
            unlink($model->file_en);
        }
        $add= new Activity;
        $add->addAct("delete", "Images", $id); //activity
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Images model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Images the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Images::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
