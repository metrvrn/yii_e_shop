<?php

namespace app\utils\dataConvertor;

class MetrCsvConvertor implements DataConvertorInterface
{
    public function toArray(string $data)
    {
        $resultArr = [];
        $dataRowsArr = explode(PHP_EOL, $data);
        foreach ($dataRowsArr as $row) {
            $resultArr[] = explode("\t", $row);
        }
        return $resultArr;
    }
}