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

    /**
     * Return all chldren of given section id as one-dimensional array
     * 
     * @param integer $rootID
     * @param array $section 
     * 
     * @return array $children
     */

    public static function getChildrenAsList($rootID, $sections = null)
    {
        if(is_null($sections)){
            $sections = static::find()->asArray()->all();
        }
        $children = [];
        foreach($sections as $section){
            if($section['parent_id'] == $rootID){
                $children[] = $section;
                $children += static::getChildrenAsList($section['id'], $sections);
            }
        }
        return $children;
    }

    /**
     * Return multi-dimesional children array of a given section id
     * By default return all sections tree
     * 
     * @param integer $rootID
     * @param array $sections
     * 
     * @return array $children
     */

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

    public static function getDirectDescendant($rootID)
    {
        return static::find()->where(['parent_id' => $rootID])->asArray()->all();
    }

    /**
     * Return all children ID of given section id
     * 
     * @param integer $rootID
     * 
     * @return array $children
     */

    public static function getChildrenID($rootID, $sections = null)
    {
        if(is_null($sections)){
            $sections = static::find()->asArray()->all();
        }
        $children = [];
        foreach($sections as $section){
            if($section['parent_id'] == $rootID){
                $children[] = $section['id'];
                $children += static::getChildrenID($section['id'], $sections);
            }
        }
        return $children;
    }
}