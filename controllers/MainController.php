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
        $products = Catalog::find()->select('product_id')->asArray()->all();
        foreach($products as $product){
            $result[] = $product['product_id'];
        }
        file_put_contents('productsID.json', json_encode($result));
        // return $this->render('test');
    }
    
    public function actionError()
    {
        
    }
}