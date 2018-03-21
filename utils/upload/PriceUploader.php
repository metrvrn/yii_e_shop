<?php

namespace app\utils\upload;

use app\models\catalog\Product;
use app\models\catalog\PricesTypes;

class PriceUploader extends BaseUploader
{
    protected function getTableName()
    {
        return 'price';
    }

    protected function getFilename()
    {
        return 'prices.csv';
    }

    protected function getFieldsMap()
    {
        return ['product_id', 'type_id', 'value', 'last_update'];
    }

    public function upload($offset)
    {
        if(!$prices = $this->getData($offset)) return false;
        $products = Product::find()->select(['id', 'xml_id'])
            ->asArray()->indexBy('xml_id')->all();
        $pricesTypes = PricesTypes::find()->select(['id', 'xml_id'])
            ->asArray()->indexBy('xml_id')->all();
        foreach($prices as &$price){
            $price[0] = isset($products[$price[0]]['id']) ? $products[$price[0]]['id'] : null;
            $price[1] = isset($pricesTypes[$price[1]]['id']) ? $pricesTypes[$price[1]]['id'] : null;
        }
        $this->saveData($prices);
    }
}