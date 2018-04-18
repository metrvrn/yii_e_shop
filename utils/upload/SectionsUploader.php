<?php

namespace app\utils\upload;

use Yii;
use app\models\catalog\Sections;

class SectionsUploader extends BaseUploader
{
    protected function getTableName()
    {
        return 'catalog_sections';
    }

    protected function getFilename()
    {
        return 'sections.csv';
    }

    protected function getFieldsMap()
    {
        return ['name', 'xml_id', 'parent_xml_id', 'depth_level', 'last_update', 'active', 'global_active'];
    }

    public function upload($offset){
        $sections = $this->getData($offset);
        // foreach($sections as &$section){
        //     $section[0] = ucfirst(strtolower(trim(preg_replace('/\d*/',null,  $section[0]), '.')));
        // }
        $this->saveData($sections);
        unset($sections);
        unset($section);
        unset($offset);
        $sections = Sections::find()->select(['id', 'xml_id'])
            ->asArray()->all();
        //update parent_id of sections by xml_id
        foreach($sections as $section){
            $xml_id = $section['xml_id'];
            $id = $section['id'];
            Yii::$app->db->createCommand()
            ->update($this->getTableName(), ['parent_id' => $id], ['parent_xml_id' => $xml_id])
            ->execute();
        }
        unset($section);
        //update product sections id
        foreach($sections as $section){
            $xml_id = $section['xml_id'];
            $id = $section['id'];
            Yii::$app->db->createCommand()
                ->update('products', ['section_id' => $id], ['section_xml_id' => $xml_id])
                ->execute();
        }
    }
}