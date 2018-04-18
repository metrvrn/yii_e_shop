<?php

namespace app\models;

use yii\db\ActiveRecord;

class Files extends ActiveRecord
{
    
    public static function tableName()
    {
        return 'files';
    }

    public function getUrl()
    {
        return $this->subfolder . "/" . $this->name;
    }
}