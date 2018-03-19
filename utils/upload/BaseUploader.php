<?php

namespace app\utils\upload;
use Yii;
use app\utils\FtpClient;
use app\utils\CsvToArrayConvertor;

abstract class BaseUploader
{
    //директория для загруженных файлов
    const tmpDir = '../runtime/catalogFiles/';

    /**
     * Скачивает, парсит и возвращает массив данных файла,
     * определенного в классе потомке, в методе getFilename()
     */

    protected  function getData($offset = null, $limit = 10000)
    {
        $filename = $this->getFilename();
        $localFile = self::tmpDir . $filename;
        if(!file_exists($localFile)){
            FtpClient::get($filename, $localFile);
        }
        $dataArr = CsvToArrayConvertor::toArrayFromFile($localFile);
        if(is_numeric($offset) and $offset < count($dataArr)){
            return $array_slice($dataArr, $offset, $limit);
        }
        return $dataArr;
    }


    /**
     * Coхранаяте массив в базу
     */
    protected function saveData($data)
    {
        Yii::$app->db->createCommand()->truncateTable($this->getTableName())->execute();
        Yii::$app->db->createCommand()
            ->batchInsert($this->getTableName(), $this->getFieldsMap(), $data)
            ->execute();
    }

    /**
     * Реализует логику обработки данных, получая их меодом getData(),
     * и сохраняя методом saveData().
     */
    protected abstract function upload();

    /**
     * Возвращает название файля для скачивания
     *
     * @return string $filename
     */
    protected abstract function getFilename();

    /**
     * Возвращает массив полей таблицы для записи
     *
     * @return array $fieldsMap
     */
    protected abstract function getFieldsMap();

    /**
     * Возвращает название таблицы для записи.
     *
     * @return string $tableName
     */
    protected abstract function getTableName();
}