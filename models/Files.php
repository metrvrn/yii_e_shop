<?php

namespace app\models;

use yii\db\ActiveRecord;

class Files extends ActiveRecord
{
    public static function tableName()
    {
        return 'files';
    }
}