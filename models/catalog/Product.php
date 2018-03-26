<?php

namespace app\models\catalog;

use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    public static function tableName()
    {
        return '{{products}}';
    }

    public function getImage()
    {
        return $this->hasOne(CatalogImage::className(), ['image_id' => 'picture_id']);
    }

    public function getPrice()
    {
        return $this->hasOne(Price::className(), ['product_id' => 'id'])
            ->where(['type_id' => 6]);
    }

    public function getQuantity()
    {
        return $this->hasOne(Quantity::className(), ['product_id' => 'id']);
    }
}