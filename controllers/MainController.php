<?php

namespace app\controllers;
use yii\web\Controller;
use app\models\catalog\CatalogSections;
use app\models\catalog\Catalog;
use app\utils\upload\ProductsUploader;
use app\utils\upload\PropertiesTypesUploader;
use app\utils\upload\PropertiesUploader;
use app\models\catalog\Sections;
use app\utils\upload\ImagesUploader;

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
        $data = Sections::getTree();
        return $this->render('test', [
            'data' => $data
        ]);
    }
    
    public function actionError()
    {
        
    }
}