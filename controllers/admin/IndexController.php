<?php

namespace app\controllers\admin;

use yii\web\Controller;

class IndexController extends Controller
{
    public $layout = 'admin';

    public function actionIndex()
    {
        return $this->render('index');
    }
}