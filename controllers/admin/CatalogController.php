<?php

namespace app\controllers\admin;

use yii\web\NotFoundHttpException;
use app\utils\metrCatalogUpdate\MetrCatalogUpdater;

class CatalogController extends AdminController
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
        $catalogUpdater = new MetrCatalogUpdater();
        $catalogUpdater->updateCatalog();
    }

    public function actionUploadPrices()
    {
        $catalogUploader = new MetrCatalogUpdater();
        $catalogUploader->updatePrices();
    }

    public function actionUploadQuantity()
    {
        $catalogUploader = new MetrCatalogUpdater();
        $catalogUploader->updateQuantity();
    }

    public function actionUploadImages()
    {
        $catalogUploader = new MetrCatalogUpdater();
        $catalogUploader->uploadFiles();
    }
}

