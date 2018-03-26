<?php

namespace app\controllers\admin;

class OrderController extends AdminController
{
    public $layout = 'admin';

    public function actionIndex()
    {
        return $this->render('index');
    }
}