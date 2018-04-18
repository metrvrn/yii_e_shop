<?php

namespace app\utils;

class CsvToArrayConvertor
{
    public static function toArray($data)
    {
        $resultArr = [];
        $dataRowsArr = explode("\n", $data);
        foreach ($dataRowsArr as $row) {
            $resultArr[] = explode("\t", $row);
        }
        return $resultArr;
    }

    public static function toArrayFromFile($path)
    {
        return static::toArray(file_get_contents($path));
    }
    
}