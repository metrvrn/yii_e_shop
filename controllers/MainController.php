<?php

namespace app\controllers;
use yii\web\Controller;
use app\models\catalog\CatalogSections;
use app\models\catalog\Catalog;

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

        $priceTypeId = 17;

        $childrenSections = CatalogSections::getAllChildren(612);

        $products = Catalog::find()
            ->limit(1)
            ->with('price', 'quantity', 'properties', 'properties.type', 'image')
            ->all();

        return $this->render('test', ['products' => $products]);
        
    }
    
    public function actionError()
    {
        
    }
}