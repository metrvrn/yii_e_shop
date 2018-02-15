<?php

namespace app\controllers\admin;

use yii\web\Controller;
use app\models\Files;

class SystemController extends Controller
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