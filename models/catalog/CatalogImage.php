<?php

namespace app\models\catalog;

use yii\db\ActiveRecord;

class CatalogImage extends ActiveRecord
{
    public static function tableName()
    {
        return "{{catalog_images}}";
    }

    public function getUrl()
    {
        return $this->path;
    }
}