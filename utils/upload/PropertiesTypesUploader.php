<?php

namespace app\utils\upload;

class PropertiesTypesUploader extends BaseUploader
{
    protected function getFilename()
    {
        return 'properties_types.csv';
    }

    protected function getTableName()
    {
        return 'properties_types';
    }

    protected function getFieldsMap()
    {
        return ['name', 'xml_code', 'last_update'];
    }

    public function upload()
    {
        $data = $this->getData();
        $this->saveData($data);
    }
}