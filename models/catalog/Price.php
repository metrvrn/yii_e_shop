<?php

namespace app\models\catalog;

use yii\db\ActiveRecord;


class Price extends ActiveRecord
{
    public static function tableName()
    {
        return 'catalog_prices';
    }
}