<?php

namespace app\controllers\admin;

class IndexController extends AdminController
{

    public function actionIndex()
    {
        return $this->render('index');
    }
}