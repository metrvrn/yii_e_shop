<?php

namespace app\controllers\admin;

use app\utils\CatalogUploader;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CatalogController extends Controller
{
    public $layout = 'admin';

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionUpload()
    {
        return $this->render('upload', ['catalogMsg' => '']);
    }

    public function actionUploadCatalog()
    {

    }

    public function actionUploadPrices()
    {

    }

    public function actionUploadQuantity()
    {

    }
}

