<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use yii\helpers\Url;
use app\models\catalog\Product;
use yii\db\ActiveQuery;
use app\models\catalog\Sections;
use yii\data\Pagination;
use app\models\sale\Order;
use yii\web\NotFoundHttpException;

class MainController extends Controller
{

    public function actionIndex()
    {   
        $products = Product::getRandom();
        return $this->render('index', [
            'products' => $products
        ]);
    }

    public function actionDelivery()
    {
        return $this->render('delivery');
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionTest($sectionID)
    {   
        if(empty($sectionID) and !is_numeric($sectionID)){
            throw new NotFoundHttpException();
        }
        $sectionsArr = Sections::getChildrenAsTree();
        return var_dump($sectionsArr);
    }

    public function actionAdmin()
    {
        return $this->redirect(Url::toRoute('admin/index'));
    }

    public function actionError()
    {
        return $this->render('error');
    }

}