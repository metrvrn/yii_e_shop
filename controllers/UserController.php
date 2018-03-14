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
        if(Yii::$app->request->isGet){
            return $this->render('registration');
        }else{
            $user = new User();
            $user->loas(Yii::$app->request->post());
            return $this->render('registration', [
                'user' => $user
            ]);
        }
    }

    public function actionLogin()
    {
        if(Yii::$app->isGet){}
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