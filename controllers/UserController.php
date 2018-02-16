<?php

namespace app\controllers;

use app\models\LoginForm;
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
            return $this->goHome();
        }
        return $this->render('registration', ['user' => $user]);
    }

    public function actionLogin()
    {
        $loginForm = new LoginForm();
        if($loginForm->load(Yii::$app->request->post()) && $loginForm->login()){
            return $this->goBack();
        }
        return $this->render('login', ['loginForm' => $loginForm]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionProfile()
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect('user/login');
        }
        $user = Yii::$app->user->identity;
        return $this->render('profile', ['user' => $user]);
    }
}