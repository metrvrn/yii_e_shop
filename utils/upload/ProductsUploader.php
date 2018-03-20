<?php

namespace app\utils\upload;

class ProductsUploader extends BaseUploader
{
 
    protected function getFilename()
    {
        return 'products.csv';
    }

    protected function getTableName()
    {
        return 'products';
    }

    protected function getFieldsMap()
    {
        return ['name', 'section_id', 'xml_id', 'preview_text', 'detail_text', 'picture_id', 'last_update'];
    }

    public function upload($offset)
    {
        $products = $this->getData($offset);
        $this->saveData($products);
    }
}