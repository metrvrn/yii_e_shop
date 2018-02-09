<?php

namespace app\utils;

use yii\httpclient\Client;
use Yii;

class CatalogUploader
{
    private $catalogUploadUrl = 'http://bitrix.local/upload/products.csv';
    private $propertiesUploadUrl = 'http://bitrix.local/upload/properties.csv';
    private $pricesUploadUrl = 'http://bitrix.local/upload/prices.csv';
    private $quantityUploadUrl = 'http://bitrix.local/upload/quantity.csv';

    private $catalogFieldsMap =
    [
        'product_id',
        'name',
        'section_id',
        'picture',
        'description',
        'xml_id'
    ];

    public function uploadCatalog()
    {   
        if($csvProducts = $this->upload($this->catalogUploadUrl)){
            $arrProducts = $this->csvToArray($csvProducts);
            Yii::$app->db->createCommand()
                ->batchInsert('catalog', $this->catalogFieldsMap, $arrProducts)
                ->execute();  
        }
        return false;
    }

    public function uploadPrices()
    {   
        if($res = $this->upload($this->pricesUploadUrl)){
            return $this->csvToArray($res);    
        }
        return false;
    }

    public function uploadQuantity()
    {   
        if($csvProducts = $this->upload($this->quantityUploadUrl)){
            
        }
        return false;
    }

    private function upload($url)
    {
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('get')
            ->setUrl($url)
            ->send();
        if($response->isOk){
            return $response->content;
        }
        return false;
    }

    private function csvToArray($csvStr)
    {
        $result = [];
        $rowArr = explode(PHP_EOL, $csvStr);
        foreach($rowArr as $row){
            $arrRow = explode('@', $row);
            if(count($arrRow) !== 6) continue;
            $result[] = $arrRow;
        }
        return $result;
    }

}