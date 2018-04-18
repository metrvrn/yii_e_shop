<?php

namespace app\utils\upload;

use app\models\catalog\Product;
use app\models\catalog\Warehouse;

class QuantityUploader extends BaseUploader
{
    protected function getTableName()
    {
        return 'quantity';
    }

    protected function getFilename()
    {
        return 'quantity.csv';
    }

    protected function getFieldsMap()
    {
        return ['product_id', 'warehouse_id', 'value'];
    }

    public function upload($offset)
    {
        $quantity = $this->getData($offset);
        $products = Product::find()->select(['id', 'xml_id'])
            ->asArray()->indexBy('xml_id')->all();
        $warehouse = Warehouse::find()->select(['id', 'xml_id'])
            ->asArray()->indexBy('xml_id')->all();
        foreach($quantity as &$q){
            $q[0] = isset($products[$q[0]]['id']) ? $products[$q[0]]['id'] : null;
            $q[1] = isset($warehouse[$q[1]]['id']) ? $warehouse[$q[1]]['id'] : null;
        }
        $this->saveData($quantity);
    }
}