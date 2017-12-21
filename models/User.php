<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{

    const SCENARIO_REGISTRATION = 'registration';
    const SCENARIO_LOGIN = 'login';

    public function scenarios()
    {
        return [
            self::SCENARIO_REGISTRATION => [
                'email',
                'password',
                'name',
                'first_name',
                'phone',
                'work_phone',
                'city',
                'street',
                'home_number',
                'office_number'],
            self::SCENARIO_LOGIN => ['email', 'password']
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }


    public static function findIdentityByAccessToken($token, $type = null){}

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->auth_key = Yii::$app->security->generateRandomString();
                $this->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
            }
            return true;
        }
    }
}
