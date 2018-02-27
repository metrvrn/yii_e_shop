<?php

namespace app\models;

use yii\db\ActiveRecord;


class BasketUser extends ActiveRecord
{
    public static function tableName()
    {
        return "basket_users";
    }
}