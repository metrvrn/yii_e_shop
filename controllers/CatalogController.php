<?php

namespace app\controllers;

use yii\web\Controller;

class CatalogController extends Controller
{
    public function actionIndex($section = null)
    {
        
        return $this->render('index', ['section' => $section]);
    }
}