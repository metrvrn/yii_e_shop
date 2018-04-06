<?php

namespace app\controllers;
use Yii;
use yii\web\controller;
use yii\helpers\Url;
use app\models\catalog\Product;
use yii\db\ActiveQuery;
use app\models\catalog\Sections;
use yii\data\Pagination;
use app\models\sale\Order;

class MainController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionDelivery()
    {
        return $this->render('delivery');
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionTest()
    {   
        $data = Yii::$app->params;
        
        return $this->render('test', [
            'data' => $data
        ]);
    }

    public function actionAdmin()
    {
        return $this->redirect(Url::toRoute('admin/index'));
    }

}