<?php

namespace app\controllers;

use app\models\User;
use Yii;
use yii\web\Controller;

class UserController extends Controller
{

    public function actionRegistration()
    {
        $user = new User();
        $user->scenario = User::SCENARIO_REGISTRATION;
        if($user->load(Yii::$app->request->post())){
            $user->save();
            return $this->render('registration', ['user' => $user]);
        }
        return $this->render('registration', ['user' => $user]);
    }

    public function actionLogin()
    {
        $user = new User();

    }
}