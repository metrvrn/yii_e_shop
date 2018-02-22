<?php

namespace app\util\metrCatalogUpdate;

use yii\base\Component;
use app\utils\FtpClient;


class MetrCatalogUpdater extends Component
{
    public function init()
    {
        $this->ftpConn = FtpClient::getInscance();
    }
    
    public function updateProducts()
    {
        
    }

    public function updatePrice()
    {

    }

    public function updateQuantity()
    {

    }
}