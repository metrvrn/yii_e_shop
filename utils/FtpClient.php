<?php

namespace app\utils;

use Yii;

class FtpClient
{

    private static $ftpConn = null;

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
        static::$ftpConn = $conn;
    }

    public static function get($remoteFile, $localFile)
    {
        if(is_null(static::$ftpConn)){
            static::getConnection();
        }
        $fd = fopen($localFile, 'w+');
        if(!ftp_fget(static::$ftpConn, $fd, $remoteFile, FTP_BINARY)){
            throw new \Exception("Error while load file $remoteFile");
        }
        return $localFile;
    }
}