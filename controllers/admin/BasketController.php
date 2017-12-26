<?php

namespace app\controllers\admin;

use yii\web\Controller;

class BasketController extends Controller
{
    public $layout = 'admin';

    public function actionIndex()
    {
        return $this->render('index');
    }
}