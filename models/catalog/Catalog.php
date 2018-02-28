<?php

namespace app\models\catalog;

use yii\db\ActiveRecord;
use app\models\Files;
use app\models\catalog\Property;

class Catalog extends ActiveRecord
{
    public static function tableName()
    {
        return 'catalog';
    }

    public function getImage()
    {
        return $this->hasOne(Files::className(), ['file_id' => 'picture']);
    }

    public function getProperties()
    {
        return $this->hasMany(Property::className(), ['product_id' => 'product_id']);
    }
}