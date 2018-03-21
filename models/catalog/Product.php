<?php

namespace app\models\catalog;

use yii\db\ActiveRecord;


class Product extends ActiveRecord
{
    public static function tableName()
    {
        return '{{products}}';
    }
}