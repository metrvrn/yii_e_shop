<?php

namespace app\models\catalog;

use yii\db\ActiveRecord;


class PropertiesTypes extends ActiveRecord
{
    public static function tableName()
    {
        return '{{properties_types}}';
    }
}