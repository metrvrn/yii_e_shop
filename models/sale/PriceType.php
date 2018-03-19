<?php

namespace app\models\sale;

use yii\db\ActiveRecord;


class PriceType extends ActiveRecord
{
    public static function tableName()
    {
        return '{{catalog_prices_types}}';
    }
}