<?php

namespace app\admin\controllers;

use yii\web\Controller;

class MainController extends Controller
{
    public $layout = 'main.php';
    public function actionIndex()
    {
        return $this->render('index');
    }
}