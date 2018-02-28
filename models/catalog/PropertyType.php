<?php

namespace app\models\catalog;

use yii\db\ActiveRecord;


class PropertyType extends ActiveRecord
{
    public static function tableName()
    {
        return 'catalog_property_type';
    }

}