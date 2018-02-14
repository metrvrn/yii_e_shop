<?php

namespace app\utils;

use yii\httpclient\Client;
use Yii;

class CatalogUploader
{

    private $baseUrl;
    private $catalogUploadUrl;
    private $propertiesUploadUrl;
    private $pricesUploadUrl;
    private $quantityUploadUrl;
    private $propertyesTypeUploadUrl;
    private $pricesTypeUploadUrl;
    private $storeTypeUploadUrl;
    private $catalogSectionsUploadUrl;

    private $catalogFieldsMap = [
        'product_id',
        'name',
        'section_id',
        'picture',
        'description',
        'xml_id'
    ];

    private $propertiesFieldsMap = [
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

    private $propertiesTypeFieldsMap = [
        'name',
        'property_type_id'
    ];

    private $pricesTypeFieldsMap = [
        'price_id',
        'name'
    ];

    private $storeTypeFieldsMap = [
        'store_id',
        'name'
    ];

    private $catalogSectionsFieldsMap = [
        'section_id',
        'parent_id',
        'name',
        'xml_id',
        'depth_level'
    ];

    public function __construct()
    {
        $this->baseUrl = 'http://bitrix.local/upload/';
        $this->catalogUploadUrl = $this->baseUrl . 'products.csv';
        $this->propertiesUploadUrl = $this->baseUrl . 'properties.csv';
        $this->pricesUploadUrl = $this->baseUrl . 'prices.csv';
        $this->quantityUploadUrl = $this->baseUrl . 'quantity.csv';
        $this->propertyesTypeUploadUrl = $this->baseUrl . 'properties_type.csv';
        $this->pricesTypeUploadUrl = $this->baseUrl . 'prices_type.csv';
        $this->storeTypeUploadUrl = $this->baseUrl . 'store_type.csv';
        $this->catalogSectionsUploadUrl = $this->baseUrl . 'sections.csv';
    }

    public function uploadAllCatalog()
    {
        $this->uploadCatalog();
        $this->uploadProperties();
        $this->uploadPropertiesType();
    }

    public function uploadCatalog()
    {
        $arrProducts = $this->upload($this->catalogUploadUrl);
        Yii::$app->db->createCommand()
            ->batchInsert('catalog', $this->catalogFieldsMap, $arrProducts)
            ->execute();
    }

    public function uploadProperties()
    {
        $arrProperties = $this->upload($this->propertiesUploadUrl);
        Yii::$app->db->createCommand()
        ->batchInsert('catalog_property', $this->propertiesFieldsMap, $arrProperties)
        ->execute();
    }

    public function uploadPropertiesType()
    {
        $arrPropertiesType = $this->upload($this->propertyesTypeUploadUrl);
        Yii::$app->db->createCommand()
        ->batchInsert('catalog_property_type', $this->propertiesTypeFieldsMap, $arrPropertiesType)
        ->execute();
    }

    public function uploadCatalogSections()
    {
        $arrSections = $this->upload($this->catalogSectionsUploadUrl);
        Yii::$app->db->createCommand()
            ->batchInsert('catalog_sections', $this->catalogSectionsFieldsMap, $arrSections)
            ->execute();
    }

    public function uploadPrices()
    {
        if ($arrPrices = $this->upload($this->pricesUploadUrl)
            and $arrPriceType = $this->upload($this->pricesTypeUploadUrl)) {
            Yii::$app->db->createCommand()
                ->batchInsert('');
            return true;
        }
        return false;
    }

    public function uploadQuantity()
    {
        if ($csvProducts = $this->upload($this->quantityUploadUrl)) {

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
        if ($response->isOk) {
            return $this->csvToArray($response->content);
        }
        throw new Exception("Unable to load $url", $response->getStatusCode());
    }

    private function csvToArray($csvStr)
    {
        $result = [];

        $rowArr = explode(PHP_EOL, $csvStr);
        foreach ($rowArr as $row) {
            $result[] = explode("\t", $row);
        }
        return $result;
    }

}