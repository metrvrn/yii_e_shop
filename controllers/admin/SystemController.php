<?php

namespace app\controllers\admin;

use app\models\Files;

class SystemController extends AdminController
{
    public $layout = 'admin';

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionFiles()
    {   
        return $this->render('files');
    }
}