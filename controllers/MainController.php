<?php

namespace app\controllers;
use yii\web\Controller;
use app\models\catalog\CatalogSections;

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
       $sectionsThree = CatalogSections::getTree();
       return $this->render('test', ['sectionsThree' => $sectionsThree]);
    }
    
    public function actionError()
    {
        
    }
}