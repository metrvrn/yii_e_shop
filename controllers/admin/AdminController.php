<?php

namespace app\controllers\admin;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;

class AdminController extends Controller
{
    public $layout = 'admin';

    public function beforeAction($action)
    {
        if(Yii::$app->user->isGuest){
            $this->redirect(Url::toRoute('user/login'));
        }
        return true;
    }
}