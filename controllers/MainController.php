<?php

namespace app\controllers;

use yii\web\controller;
use yii\helpers\Url;

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
        $data = '123';
        return $this->render('test', [
            'data' => $data
        ]);
    }

    public function actionAdmin()
    {
        return $this->redirect(Url::toRoute('admin/index'));
    }

}