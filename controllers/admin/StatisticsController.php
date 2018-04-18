<?php

namespace app\controllers\admin;

class StatisticsController extends AdminController
{
    public $layout = 'admin';

    public function actionIndex()
    {
        return $this->render('index');
    }
}