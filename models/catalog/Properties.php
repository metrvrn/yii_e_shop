<?php

namespace app\models\catalog;

use yii\db\ActiveRecord;

class Properties extends ActiveRecord
{
    public static function tableName()
    {
        return 'properties';
    }

    public function getType()
    {
        return $this->hasOne(PropertiesTypes::className(), ['id' => 'property_id']);
    }
}