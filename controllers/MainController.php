<?php

namespace app\controllers;
use yii\web\Controller;
use app\models\catalog\Sections;

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
        $sections = Sections::getThree();
        return $this->render('test', ['sections' => $sections]);
    }   
}