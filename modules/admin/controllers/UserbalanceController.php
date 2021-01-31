<?php

namespace app\modules\admin\controllers;

use yii\data\ActiveDataProvider;
use app\modules\admin\models\User;
use app\modules\admin\models\UserBalances;
use app\models\Service;

class UserbalanceController extends \yii\web\Controller
{
    // public function actionIndex()
    // {
    //     return $this->render('index');
    // }

    
    public function actionIndex()
    {
        $new = User::find();
        $user = User::find()->all();
        $dataProvider = new ActiveDataProvider([
            'query' => $new,
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'user' => $user,
        ]);
    }

    public function actionView($id)
    {
        $new = UserBalances::find() -> where(['User_id' => $id]);
        $user = User::find() -> where(['id' => $id])->all();
        $dataProvider = new ActiveDataProvider([
            'query' => $new,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider,
            'user' => $user,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = UserBalances::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}