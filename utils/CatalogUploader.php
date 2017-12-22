<?php

namespace app\utils;

use yii\httpclient\Client;

class CatalogUploader
{
    public function getPage()
    {
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('get')
            ->setUrl('http://example.com/')
            ->send();
        if ($response->isOk) {
            return $response;
        }
        return false;
    }
}