<?php

namespace app\commands;

use yii\console\Controller;
use app\models\User;

class InstallController extends Controller
{

    public function actionAddAdmin($adminPass, $adminEmail)
    {
        $admin = new User();
        $admin->scenario = User::SCENARIO_REGISTRATION;
        $admin->name = 'admin';
        $admin->password = $adminPass;
        $admin->email = $adminEmail;
        $admin->save();
    }
}