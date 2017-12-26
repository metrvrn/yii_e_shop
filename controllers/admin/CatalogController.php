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
        $catalogUploader = new CatalogUploader();

        return $this->render('upload', ['test' => random_int(0, 100)]);
    }
}

