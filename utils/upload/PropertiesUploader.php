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
        return ['property_id', 'product_id', 'value'];
    }

    public function upload()
    {
        $properties = $this->getData();
        $products = Product::find()->select(['id', 'xml_id'])
            ->asArray()->indexBy('xml_id')->all();
        $propertiesTypes = PropertiesTypes::find()->select(['id', 'xml_code'])
            ->asArray()->indexBy('xml_code')->all();
        foreach($properties as &$property)
        {
            $property[1] = $products[$property[1]]['id'];
            $property[2] = $propertiesTypes[$property[2]]['id'];
        }
        return $properties;
    }

    
}