<?php

namespace app\utils\metrCatalogUpdate;

use Yii;
use app\utils\FtpClient;
use app\utils\dataConvertor\MetrCsvConvertor;

class MetrCatalogGetter
{
    const PROPERTIES = 'properties.csv';
    const PRODUCTS = 'products.csv';
    const PRICES = 'prices.csv';
    const QUANTITY = 'quantity.csv';
    const PROPERTIES_TYPES = 'properties_types.csv';
    const STORE_TYPES = 'store_types.csv';
    const PRICES_TYPES = 'prices_types.csv';
    const SECTIONS = 'sections.csv';

    private $ftpClient = null;

    public function __construct()
    {
        $this->ftpClient = FtpClient::getInscance();
    }

    public function get(string $entity)
    {
        $localFile = Yii::$app->params['metrCatalogGetter']['tmpFolder'].$entity;
        $remoteFile = Yii::$app->params['metrCatalogGetter']['downloadUrl'].$entity;
        $this->ftpClient->get($remoteFile, $localFile);
        return MetrCsvConvertor::toArrayFromFile($localFile);
    }
}
