<?php

namespace app\models\catalog;

use yii\db\ActiveRecord;
use yii\web\NotFoundHttpException;

class Sections extends ActiveRecord
{
    public static function tableName()
    {
        return 'catalog_sections';
    }

    public static function getTree()
    {
        $sectionList = static::find()->indexBy('id')->asArray()->orderBy('name')->all();
        $rootElements = static::getRootElements($sectionList);
        foreach($rootElements as &$rootElement){
            $rootElement['children'] = static::getChildren($rootElement['id'], $sectionList);
        }
        return $rootElements;
    }

    private static function getRootElements($sectionList)
    {
        $rootElements = [];
        foreach($sectionList as $section){
            if($section['parent_id'] === null and $section['depth_level'] == 1){
                $rootElements[$section['id']] = $section;
            }
        }
        return $rootElements;
    }

    private static function getChildren($parentId, $sections){
        $children = [];
        foreach($sections as $section){
            if($section['parent_id'] == $parentId){
                $children[] = $section;
            }
        }
        if(!empty($children)){
            foreach($children as &$child){
                $child['children'] = static::getChildren($child['id'], $sections);
            }
        }
        return $children;
    }

    public static function getChildrenId($id)
    {
        $childrenId = [];
        $sectionList = static::find()->indexBy('id')->asArray()->orderBy('name')->all();
        $children = static::getChildren($id, $sectionList);
        foreach($children as $child){
            $childrenId[] = $child['id'];
        }
        return $childrenId;
    }
}