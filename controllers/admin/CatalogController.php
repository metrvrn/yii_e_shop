<?php

namespace app\controllers\admin;

use app\utils\CatalogUploader;
use yii\web\Controller;

class CatalogController extends Controller
{
    public $layout = 'admin';

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionUpload()
    {
        return $this->render('upload');
    }

    public function actionCatalogUploadAjax()
    {
        $uploader = new CatalogUploader();
        $res = $uploader->uploadCatalog();
        return $this->render('testUpload', ['data' => $res]);
    }

    public function actionPriceUploadAjax()
    {
        return $this->asJson(['step' => 35]);
    }

    public function actionQuantityUploadAjax()
    {
        return $this->asJson(['number' => 42]);
    }
}

