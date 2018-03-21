<?php

namespace app\utils\upload;

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
        return ['name', 'xml_id', 'parent_xml_id', 'depth_level', 'last_update'];
    }

    public function upload($offset){
        $sections = $this->getData($offset);
        foreach($sections as &$section){
            $section[0] = ucfirst(strtolower(trim(preg_replace('/\d*/',null,  $section[0]), '.')));
        }
        $this->saveData($sections);
        $sections = Sections::find()->select(['id', 'xml_id'])
            ->asArray()->indexBy('xml_id')->all();
        Yii::$app->db->createCommand()->execute();
    }
}