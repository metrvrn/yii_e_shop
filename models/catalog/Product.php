<?php

namespace app\models\catalog;

use yii\db\ActiveRecord;
use yii\db\ActiveQuery;
use yii\db\Expression;

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
        return static::find()
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

    public function getRandom($priceType = 6, $limit = 30)
    {
        return static::find()
        ->with(['image', 'properties.type', 'quantity', 'price'])
        ->innerJoin('quantity')
        ->onCondition('quantity.product_id = products.id')
        ->innerJoin('price')
        ->andOnCondition('price.product_id = products.id')
        ->andWhere('quantity.value != 0')
        ->andWhere('price.value != 0')
        ->andWhere(['price.type_id' => $priceType])
        ->limit($limit)
        ->all();
    }

    public function search($pattern, $limit = 15, $offset = 0)
    {
        return static::find()
        ->select('products.name, products.id, products.picture_id')
        ->with('image')
        ->innerJoin('quantity')
        ->onCondition('quantity.product_id = products.id')
        ->innerJoin('price')
        ->andOnCondition('price.product_id = products.id')
        ->where(['like', 'products.name', $pattern])
        ->andWhere('quantity.value != 0')
        ->andWhere('price.value != 0')
        ->andWhere('price.type_id = 6')
        ->andWhere('quantity.warehouse_id = 1')
        ->limit($limit)
        ->offset($offset)
        ->asArray()
        ->all();
    }
}