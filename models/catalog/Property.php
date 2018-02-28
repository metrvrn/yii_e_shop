<?php

namespace app\models\catalog;

use yii\db\ActiveRecord;


class Property extends ActiveRecord
{
    public static function tableName()
    {
        return 'catalog_property';
    }

    public function getType()
    {
        return $this->hasOne(PropertyType::className(), ['property_type_id' => 'property_id']);
    }
}