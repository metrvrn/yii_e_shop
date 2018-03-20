<?php

namespace app\utils\upload;

use app\models\Product;
use app\models\PropertiesTypes;

class PropertiesUploader extends BaseUploader
{
    protected function getFilename()
    {
        return 'properties.csv';
    }

    protected function getTableName()
    {
        return 'properties';
    }

    protected function getFieldsMap()
    {
        return ['value', 'product_id', 'property_id'];
    }

    public function upload($offset)
    {
        if(!$properties = $this->getData($offset)) return false;
        $products = Product::find()->select(['id', 'xml_id'])
            ->asArray()->indexBy('xml_id')->all();
        $propertiesTypes = PropertiesTypes::find()->select(['id', 'xml_code'])
            ->asArray()->indexBy('xml_code')->all();
        foreach($properties as &$property)
        {
            $property[1] = isset($products[$property[1]]['id']) ? $products[$property[1]]['id'] : null;
            $property[2] = isset($propertiesTypes[$property[2]]['id']) ? $propertiesTypes[$property[2]]['id'] : null;
        }
        $this->saveData($properties);
    }

    
}