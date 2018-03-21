<?php

namespace app\models\catalog;

use yii\db\ActiveRecord;

class Sections extends ActiveRecord
{
    public static function tableName()
    {
        return 'catalog_sections';
    }
}