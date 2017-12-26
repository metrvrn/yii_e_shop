<?php

namespace app\controllers\admin;

use yii\web\Controller;

class OrderController extends Controller
{
    public $layout = 'admin';

    public function actionIndex()
    {
        return $this->render('index');
    }
}