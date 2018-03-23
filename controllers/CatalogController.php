<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\catalog\Sections;
use app\models\catalog\Product;
use yii\data\Pagination;


class CatalogController extends Controller
{
    public function actionMain($section = null)
    {
        if($section === null and !is_numeric($section)){
            $this->redirect('catalog/index');
        }
        $sections = Sections::find()->where(['parent_id' => $section])->all();
        $childrenSections = Sections::getChildrenId($section);
        $productsQuery = Product::find()
            ->where(['section_id' => $childrenSections]);
        
        $pagination = new Pagination([
            'totalCount' => $productsQuery->count(),
            'pageSize' => 30,
        ]);

        $products = $productsQuery->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        
        return $this->render('main', [
            'sections' => $sections,
            'products' => $products,
            'pagination' => $pagination
            ]);
    }

    public function actionIndex($section = null)
    {
        $sections  = CatalogSections::find()->where(['depth_level' => 1])->orderBy('name')->all();
        return $this->render('index', ['sections' => $sections]);
    }

    public function actionDetail($id)
    {
        $product = Catalog::find()
        ->where(['product_id' => $id])
        ->with('price', 'quantity', 'properties', 'properties.type', 'image')
        ->limit(1)
        ->one();

        return $this->render('detail', ['product' => $product]);
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