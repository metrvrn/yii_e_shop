<?php

namespace app\controllers\admin;

class BasketController extends AdminController
{
    public $layout = 'admin';

    public function actionIndex()
    {
        return $this->render('index');
    }
}