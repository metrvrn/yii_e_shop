<?php

namespace app\models\sale;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;


class Order extends ActiveRecord
{
    public static function tableName()
    {
        return 'order';
    }

    public function behaviors()
    {
        return[
            TimestampBehavior::className(),
        ];
    }

    public function rules()
    {
        return [
            [['user_name', 'user_phone'], 'required'],
            [['user_id', 'user_surname', 'user_patronymic', 'user_company',
            'user_workphone', 'delivery_name', 'delivery_description',
            'delivery_city', 'delivery_street', 'delivery_house_number',
            'delivery_office_number', 'payment_name', 'payment_description'], 'safe'],
            [['user_email'], 'email']
        ];
    }

    public function attributeLabels()
    {
        return [
            'user_name' => 'Имя',
            'user_surname' => 'Фамилия',
            'user_patronymic' => 'Отчество',
            'user_company' => 'Компания',
            'user_phone' => 'Телфон',
            'user_workphone' => 'Рабочий телефон',
            'delivery_name' => 'Тип доставки',
            'delivery_description' => 'Описание доставки',
            'delivery_city' => 'Город',
            'delivery_street' => 'Улица',
            'delivery_house_number' => 'Номер дома',
            'delivery_office_number' => 'Номер квартиры/оффиса',
            'payment_name' => 'Тип оплаты',
            'payment_description' => 'Описание оплаты',
            'user_email' => 'Email'
        ];
    }

    public static function getSumById()
    {
        
    }
}

