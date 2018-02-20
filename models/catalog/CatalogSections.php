<?php

namespace app\models\catalog;

use yii\db\ActiveRecord;

class CatalogSections extends ActiveRecord
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

    public static function getCatalogThree()
    {
        $sectionsThree = static::find()->all();
        $sectionsThree = static::createThreeFromList($sectionsThree);
        return $sectionsThree; 
    }

    public static function getTree()
    {
        $sectionsList = static::find()->orderBy('name')->asArray()->all();
        $indexedSectionsList = [];
        foreach($sectionsList as $i => $section){
            $indexedSectionsList[$section['section_id']] = $section;
        }
        unset($sectionsList);
        return static::buildTreeFromList($indexedSectionsList);
    }

    private static function buildTreeFromList($sectionsList)
    {
        $rootElemsID = [];
        $resultTree = [];
        foreach($sectionsList as $section){
            if($section['parent_id']){
                $sectionsList[$section['parent_id']]['childs'][] =& $sectionsList[$section['section_id']];
            }
            else{
                $rootElemsID[] = $section['section_id'];
            }
        }
        foreach($rootElemsID as $id){
            $resultTree[$id] = $sectionsList[$id];
        }
        return $resultTree;
    }
}
