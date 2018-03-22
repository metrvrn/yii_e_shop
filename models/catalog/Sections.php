<?php

namespace app\models\catalog;

use yii\db\ActiveRecord;

class Sections extends ActiveRecord
{
    public static function tableName()
    {
        return 'catalog_sections';
    }

    public static function getTree()
    {
        $sections =  static::find()->asArray()->indexBy('id')->all();
        $rootElements = [];
        foreach($sections as $section){
            if($section['parent_id'] === null){
                $rootElements[] = $section;
            }
        }
        return $rootElements;
    }
}