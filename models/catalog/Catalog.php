<?php

namespace app\models\catalog;

use yii\db\ActiveRecord;
use app\models\Files;
use app\models\catalog\Property;
use app\models\catalog\Quantity;

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

    public function getPrice()
    {
        return $this->hasOne(Price::className(), ['product_id' => 'product_id']);
    }

    public function getQuantity()
    {
        return $this->hasOne(Quantity::className(), ['product_id' => 'product_id']);
    }


}