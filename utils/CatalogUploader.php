<?php

namespace app\utils;

use yii\httpclient\Client;

class CatalogUploader
{
    private $catalogUploadUrl = "http://test.metropt.ru/exchange/upload_catalog.php";

    public function getPage()
    {
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('get')
            ->setUrl('http://example.com/')
            ->send();
        if ($response->isOk) {
            return $response->content;
        }
        return false;
    }

    //?action=catalog&step=0&price=roz,opt
    public function uploadCatalog()
    {
        $client = new Client();
        $response = $client->createREquest()
            ->setMethod('GET')
            ->setUrl($this->catalogUploadUrl)
            ->send();
    }

    public function uploadPrice()
    {

    }

    public function uploadQuantity()
    {
        
    }
}