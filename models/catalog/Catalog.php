<?php

namespace app\models\catalog;

use yii\db\ActiveRecord;

class Catalog extends ActiveRecord
{
    public static function tableName()
    {
        return 'catalog';
    }
}