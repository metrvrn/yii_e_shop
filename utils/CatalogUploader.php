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
    private $propertyesTypeUploadUrl = 'http://bitrix.local/upload/propertyes_type.csv';
    private $pricesTypeUploadUrl = 'http://bitrix.local/upload/prices_type.csv';
    private $storeTypeUploadUrl = 'http://bitrix.local/upload/store_type.csv';

    private $catalogFieldsMap =
    [
        'product_id',
        'name',
        'section_id',
        'picture',
        'description',
        'xml_id'
    ];

    private $propertyFieldsMap =[
        'product_id',
        'property_id',
        'value'
    ];

    private $pricesFieldsMap = [
        'product_id',
        'type',
        'value'
    ];

    private $quantityFieldsMap = [
        'product_id',
        'value',
        'store_id'
    ];

    private $propertyesTypeFieldsMap = [
        'name',
        'xml_id'
    ];

    private $pricesTypeFieldsMap = [
        'price_id',
        'name'
    ];

    private $storeTypeFieldsMap = [
        'store_id',
        'name'
    ];

    public function uploadCatalog()
    {   
        if($arrProducts = $this->upload($this->catalogUploadUrl)){
            Yii::$app->db->createCommand()
                ->batchInsert('catalog', $this->catalogFieldsMap, $arrProducts)
                ->execute();
            return true;  
        }
        return false;
    }

    public function uploadPrices()
    {   
        if($arrPrices = $this->upload($this->pricesUploadUrl)
        and $arrPriceType = $this->upload($this->pricesTypeUploadUrl)){
            Yii::$app->db->createCommand()
                ->batchInsert('');
            return true;
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
            return $this->csvToArr($response->content);
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