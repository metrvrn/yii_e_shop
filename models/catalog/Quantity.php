<?php

namespace app\models\catalog;

use yii\db\ActiveRecord;

class Quantity extends ActiveRecord
{
    public static function tableName()
    {
        return "{{quantity}}";
    }
}