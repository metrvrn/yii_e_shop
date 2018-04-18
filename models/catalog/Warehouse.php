<?php

namespace app\models\catalog;

use yii\db\ActiveRecord;

class Warehouse extends ActiveRecord
{
    public static function tableName()
    {
        return 'warehouse';
    }
}