<?php

namespace app\utils\exchange;

use Yii;
use yii\base\Component;


class MetrCatalogUploader extends Component
{
    public $ftpUser;
    public $ftpPass;
    public $ftpHost;
    public $catalogBaseUrl;
    public $uploadDir;

    private $ftpConn;

    public function init()
    {
        if(!$this->ftpConn = ftp_connect($this->ftpHost)){
            throw new \Exception("Failed to establish ftp connection");
        }

        ftp_set_option($this->ftpConn, FTP_TIMEOUT_SEC, 10);

        if(!ftp_login($this->ftpConn, $this->ftpUser, $this->ftpPass)){
            throw new \Exception("Failed to log in");
        }
    }

    public function downloadCatalog()
    {
        $this->download($this->uploadDir."products.csv", $this->catalogBaseUrl."/products.csv");
    }

    public function getPrices()
    {

    }

    public function getRemains()
    {
        
    }

    public function download($localFile, $remoteFile)
    {   
        $fd = fopen("../".$localFile, 'w+');
        if(!ftp_fget($this->ftpConn, $fd, $remoteFile, FTP_BINARY)){
            throw new \Exception("Can't load $remoteFile");
        }
    }
}
