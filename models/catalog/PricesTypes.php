<?php

namespace app\models\catalog;

use yii\db\ActiveRecord;


class PricesTypes extends ActiveRecord
{
    public static function tableName()
    {
        return '{{prices_types}}';
    }
}