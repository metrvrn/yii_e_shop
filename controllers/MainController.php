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
        $childrenSections = CatalogSections::getAllChildren(612);

        // $products = Catalog::find()->select('catalog.*')
        //     ->innerJoin('catalog_quantity', '`catalog_quantity`.`product_id` = `catalog`.`product_id`')
        //     ->innerJoin('catalog_prices', '`catalog_prices`.`product_id` = `catalog`.`product_id`')
        //     ->innerJoin('catalog_property', '`catalog_property`.`product_id` = `catalog`.`product_id`')
        //     // ->innerJoin('catalog_property_type', '`catalog_property_type`.`property_type_id` = `catalog_property`.`property_id`')
        //     ->onCondition(['>', '`catalog_quantity`.`value`', 0])
        //     ->onCondition(['`catalog_prices`.`type_id`' => 17])
        //     ->where(['catalog.section_id' => $childrenSections])
        //     ->with(['quantity', 'price', 'properties'])
        //     ->limit(30)
        //     ->all();

        $products = Catalog::find()
            ->select('catalog.*')
            ->where(['catalog.section_id' => $childrenSections])
            ->joinWith(['quantity'], true, 'LEFT JOIN')
            ->onCondition(['>', '`catalog_quantity`.`value`', 0])
            ->with(['quantity', 'price', 'properties'])
            ->limit(30)
            ->all();
        return $this->render('test', ['products' => $products]);
        
    }
    
    public function actionError()
    {
        
    }
}