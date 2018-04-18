<?php

namespace app\utils\upload;

class PricesTypesUploader extends BaseUploader
{
    protected function getTableName()
    {
        return 'prices_types';
    }

    protected function getFilename()
    {
        return 'prices_types.csv';
    }

    protected function getFieldsMap()
    {
        return ['name', 'xml_id', 'last_update'];
    }

    public function upload($offset)
    {
        $pricesTypes = $this->getData($offset);
        $this->saveData($pricesTypes);
    }
}