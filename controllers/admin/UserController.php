<?php

namespace app\controllers\admin;

class UserController extends AdminController
{
    public $layout = 'admin';

    public function actionIndex()
    {
        return $this->render('index');
    }
}