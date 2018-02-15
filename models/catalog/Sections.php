<?php

namespace app\models\catalog;

use yii\db\ActiveRecord;

class Sections extends ActiveRecord
{
    public static function tableName()
    {
        return 'catalog_sections';
    }

    public static function getAllChildren($section_id)
    {
        $children = static::getChildrenRecursive($section_id);
        if(is_array($children)){
            $result = [];
            array_walk_recursive($children, function($val) use (&$result){
                $result[] = $val;
            });
            return $result;
        }
        return $children;
    }

    public static function getChildrenRecursive($section_id)
    {
        $result = [];
        $children = static::find()->where(['parent_id' => $section_id])->all();
        if(empty($children)){
            return $section_id;
        }
        foreach($children as $child){
            $result[] = static::getChildrenRecursive($child['section_id']);
        }
        return $result;
    }
}
