<?php

namespace app\controllers;

use yii\web\controller;
use yii\helpers\Url;
use app\models\catalog\Product;
use yii\db\ActiveQuery;
use app\models\catalog\Sections;
use yii\data\Pagination;

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
        $section = 98;

        if($section === null and !is_numeric($section)){
            $this->redirect('catalog/index');
        }
        $sections = Sections::find()->where(['parent_id' => $section])->all();
        $childrenSections = Sections::getChildrenId($section);
        $productsQuery = Product::getAvailableQuery($childrenSections, 6);
        
        $pagination = new Pagination([
            'totalCount' => $productsQuery->count(),
            'pageSize' => 30,
        ]);

        $products = $productsQuery->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        
        return $this->render('test', [
            'data' => $products
        ]);
    }

    public function actionAdmin()
    {
        return $this->redirect(Url::toRoute('admin/index'));
    }

}