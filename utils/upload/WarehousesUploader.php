<?php

namespace app\utils\upload;

class WarehousesUploader extends BaseUploader
{
    protected function getTableName()
    {
        return 'warehouse';
    }

    protected function getFilename()
    {
        return 'warehouses.csv';
    }

    protected function getFieldsMap()
    {
        return ['name', 'xml_id', 'last_update'];
    }

    public function upload($offset)
    {
        $warehouses = $this->getData($offset);
        $this->saveData($warehouses);
    }
}