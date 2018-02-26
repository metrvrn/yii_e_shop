<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\catalog\CatalogSections;
use app\models\catalog\Catalog;


class CatalogController extends Controller
{
    public function actionMain($section = null)
    {
        if($section === null and !is_numeric($section)){
            $this->redirect('catalog/index');
        }
        $sections = CatalogSections::find()->where(['parent_id' => $section])->all();
        $childrenSections = CatalogSections::getAllChildren($section);
        $products = Catalog::find()->where(['section_id' => $childrenSections])->orderBy('name')->limit(30)->all();
        return $this->render('main', [
            'sections' => $sections,
            'products' => $products,
            ]);
    }

    public function actionIndex($section = null)
    {
        $sections  = CatalogSections::find()->where(['depth_level' => 1])->orderBy('name')->all();
        return $this->render('index', ['sections' => $sections]);
    }

    public function actionBasketAddAjax()
    {
        $userId = Yii::$app->user->getId();
        $request = Yii::$app->request;
        $productId = $request->post('productId');
        $quantity = $request->post('quantity');

        return $this->asJson(['result' => 'success']);
    }
}