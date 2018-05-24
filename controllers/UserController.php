<?php

namespace app\controllers;

use app\models\LoginForm;
use app\models\User;
use Yii;
use yii\web\Controller;
use app\models\RegistrationForm;
use yii\helpers\Url;

class UserController extends Controller
{

    public function actionRegistration()
    {
        $regForm = new RegistrationForm();
        $regForm->setScenario(RegistrationForm::SCENARIO_REGISTRATION);
        $post = Yii::$app->request->post();
        if($regForm->load(Yii::$app->request->post()) && $regForm->validate()){
            $params = $regForm->attributes;
            unset($params['confirm_password']);
            $user = new User();        
            if($user->load($params, '') and $user->save()){
                Yii::$app->user->login($user);
                return $this->redirect(Url::toRoute(['main/index']));
            }
        }
        return $this->render('registration', [
            'user' => $regForm
        ]);
    }

    public function actionLogin()
    {   
        $error = false;
        $request = Yii::$app->request;
        if($request->getIsPost()){
            if($user = User::findOne(['email' => $request->get('email')]) &&
                $user->validatePassword($request->get('password'))){
                    Yii::$app->user->login($user);
                    return $this->redirect('main/index');
            }else{
                $error = true;
            }
        }
        return $this->render('login', ['error' => $error]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionProfile()
    {
        if(Yii::$app->user->getIsGuest()){
            return $this->redirect(Url::toRoute('user/login'));
        }
        $user = Yii::$app->user->identity;
        return $this->render('profile', ['user' => $user]);
    }

    public function actionEditProfile()
    {
        if(Yii::$app->user->getIsGuest()){
            return $this->redirect(Url::toRoute('user/login'));
        }
        $request = Yii::$app->request;
        if($request->getIsPost()){
            
        }
        $user = Yii::$app->user->getIdentity();
        return $this->render('edit-profile', [
            'user' => $user
        ]);
    }
}