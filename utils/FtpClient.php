<?php

namespace app\utils;

use Yii;

class FtpClient
{
    private static $ftpConn;

    public static function download(string $remoteFile, string $localFile)
    {
        if(is_null(static::$ftpConn)){
            $host = Yii::$app->params['ftp']['host'];
            $user = Yii::$app->params['ftp']['user'];
            $pass = Yii::$app->params['ftp']['pass'];
            static::getConnection($host, $user, pass);    
        }
        $fd = fopen($localFile, 'w+');
        if(!ftp_fget(static::$ftpConn, $fd, $remoteFile, FTP_BINARY)){
            throw new \Exception("Error loading file $remoteFile");
        }
    }

    private static function getConnection($host, $user, $pass)
    {
        if(!$conn = ftp_connect($host)){
            throw new \Exception("Ftp connection error");
        }
        ftp_set_option($conn, FTP_TIMEOUT_SEC, 10);
        if(ftp_login($conn, $user, $pass)){
            throw new \Exception("Ftp authentication error");
        }
        static::$ftpConn = $conn;
    }
}