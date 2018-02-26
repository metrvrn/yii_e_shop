<?php

namespace app\models;

use yii\db\ActiveRecord;


class Basket extends ActiveRecord
{
    public static function tableName()
    {
        return 'basket';
    }

    
}