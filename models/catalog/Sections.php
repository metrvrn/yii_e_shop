<?php

namespace app\models\catalog;

use yii\db\ActiveRecord;
use yii\web\NotFoundHttpException;
use yii\helpers\ArrayHelper;

class Sections extends ActiveRecord
{
    public static function tableName()
    {
        return 'catalog_sections';
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

    public static function getChildrenArray($rootID, $sections = null)
    {
        if(is_null($sections)){
            $sections = static::find()->all();
        }
        $children = [];
        foreach($sections as $section){
            if($section->parent_id == $rootID){
                $children[] = $section;
                $children += static::getChildrenArray($section->id, $sections);
            }
        }
        return $children;
    }

    public static function getChildrenAsTree($rootID = null, $sections = null)
    {
        if(is_null($sections)){
            $sections = static::find()->asArray()->all();
        }
        $children = [];
        foreach($sections as $section){
            if((int)$section['parent_id'] ===  (int)$rootID){
                $section['children'] = static::getChildrenAsTree($section['id'], $sections);
                $children[] = $section;
            }
        }
        return $children;
    }
}