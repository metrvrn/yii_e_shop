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

    public function actionTestUpload()
    {
        $uploader = new CatalogUploader();
        $data = $uploader->getPage();
        return $this->renderPartial('testUpload', ['data' => $data]);
    }

    public function actionUpload()
    {
        return $this->render('upload');
    }

    public function actionCatalogUploadAjax($step)
    {
        sleep(1);
        $response = [
            'currentStep' => (int) $step,
            'totalStep' => 10
        ];
        return $this->asJson($response);
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

