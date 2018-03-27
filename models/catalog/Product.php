<?php

namespace app\models\catalog;

use yii\db\ActiveRecord;
use yii\db\ActiveQuery;

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
        return $this->hasOne(Price::className(), ['product_id' => 'id']);
    }

    public function getQuantity()
    {
        return $this->hasOne(Quantity::className(), ['product_id' => 'id'])
            ->onCondition('value <> 0');
    }

    public function getProperties()
    {
        return $this->hasMany(Properties::className(), ['product_id' => 'id']);
    }

    public static function getAvailableQuery($sections, $priceType)
    {
        return Product::find()
        ->with(['image', 'properties.type', 'quantity', 'price'])
        ->innerJoin('quantity')
        ->onCondition('quantity.product_id = products.id')
        ->innerJoin('price')
        ->andOnCondition('price.product_id = products.id')
        ->where(['products.section_id' => $sections])
        ->andWhere('quantity.value != 0')
        ->andWhere('price.value != 0')
        ->andWhere(['price.type_id' => $priceType]);
    }
}