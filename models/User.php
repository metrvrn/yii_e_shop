<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use app\models\sale\BasketUser;

class User extends ActiveRecord implements IdentityInterface
{

    const SCENARIO_REGISTRATION = 'registration';
    const SCENARIO_LOGIN = 'login';

    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return[
            [['email', 'password', 'name', 'phone'], 'required', 'on' => self::SCENARIO_REGISTRATION],
            [['email'], 'email', 'on' => self::SCENARIO_REGISTRATION],
            [['email', 'password', 'surname', 'patronymic', 'company', 'phone', 'work_phone', 'city', 'street', 'house_number', 'office_number'], 'string', 'on' => self::SCENARIO_REGISTRATION]
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
