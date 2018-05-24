<?php

namespace app\controllers\admin;

use yii\web\NotFoundHttpException;
use app\utils\metrCatalogUpdate\MetrCatalogUpdater;

class CatalogController extends AdminController
{
    public function actionProducts()
    {
        
        return $this->render('products');
    }

    public function actionProductsProperties()
    {
        return $this->render('properties-types');
    }
}

