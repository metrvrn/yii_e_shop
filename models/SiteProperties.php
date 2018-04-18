<?php

namespace app\models;

use yii\db\ActiveRecord;

class SiteProperties extends ActiveRecord
{
    public static function tableName()
    {
        return "{{site_properties}}";
    }
}