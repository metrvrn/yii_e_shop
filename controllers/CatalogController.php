<?php

namespace app\controllers;

use Yii;
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

        $sections = Sections::getChildrenArray($section);
        $productsQuery = Product::getAvailableQuery($sections, 6);

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
        $product = Product::find()
        ->where(['id' => $id])
        ->with('price', 'quantity', 'properties.type', 'image')
        ->one();
        return $this->render('detail', ['product' => $product]);
    }

    public function actionSearchAjax()
    {
        $pattern = Yii::$app->request->get('pattern');
        $productsArr = Product::search($pattern, 15, 0);
        return $this->asJson($productsArr);
    }


}