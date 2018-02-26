<?php

namespace app\utils;

use Yii;

class FtpClient
{
    private static $instance;

    private $ftpConn;

    public static function getInscance()
    {
        if(gettype(static::$instance) !== static::class){
            static::$instance = new static();    
        }
        return static::$instance;
    }
    
    private function __construct()
    {
        $this->ftpConn = static::getConnection();
    }

    public function resetConnection()
    {
        $this->ftpConnection = static::getConnection();
    }

    private static function getConnection()
    {   
        $usedConfig = Yii::$app->params['ftpClient']['usedConfig'];
        $host = Yii::$app->params['ftpClient']['configs'][$usedConfig]['host'];
        $user = Yii::$app->params['ftpClient']['configs'][$usedConfig]['user'];
        $pass = Yii::$app->params['ftpClient']['configs'][$usedConfig]['pass'];
        if(!$conn = ftp_connect($host)){
            throw new \Exception("Ftp connection error");
        }
        ftp_set_option($conn ,FTP_TIMEOUT_SEC, 10);
        if(!ftp_login($conn, $user, $pass)){
            throw new \Exception("Ftp authentication error");
        }
        ftp_pasv($conn, true);
        return $conn;
    }

    public function get(string $remoteFile, string $localFile)
    {
        $fd = fopen($localFile, 'w+');
        if(!ftp_fget($this->ftpConn, $fd, $remoteFile, FTP_BINARY)){
            throw new \Exception("Error while load file $remoteFile");
        }
        return $localFile;
    }
}