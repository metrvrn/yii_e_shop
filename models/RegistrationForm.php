<?php

namespace app\models;

use yii\base\Model;

class RegistrationForm extends Model
{
    const SCENARIO_REGISTRATION = 'registration';
    const SCENARIO_LOGIN = 'login';

    public $email;
    public $password;
    public $confirm_password;
    public $name;
    public $surname;
    public $patronymic;
    public $phone;
    public $work_phone;
    public $city;
    public $street;
    public $house_number;
    public $office_number;
    public $company;


    public function rules()
    {
        return [[['email'], 'email', 'on' => self::SCENARIO_REGISTRATION, 'message' => "Неправильный email адрес"],
            [['name'], 'string', 'min' => 3, 'max' => 12, 'on' => self::SCENARIO_REGISTRATION],
            [['password'], 'required', 'on' => self::SCENARIO_REGISTRATION],
            [['compare_password'], 'compare', 'compareAttribute' => 'password', 'on' => self::SCENARIO_REGISTRATION],
            [['phone'], 'number', 'min' => 5, 'on' => self::SCENARIO_REGISTRATION],
            [['email', 'password', 'surname', 'patronymic', 'company', 'phone', 'work_phone', 'city', 'street', 'house_number', 'office_number'], 'string', 'on' => self::SCENARIO_REGISTRATION]
        ];
    }
}