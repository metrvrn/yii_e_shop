<?php

use yii\db\Migration;

/**
 * Handles the creation of table `catalog_sections`.
 */
class m180326_073525_create_catalog_sections_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('catalog_sections', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'xml_id' => $this->string(),
            'parent_xml_id' => $this->string(),
            'depth_level' => $this->integer(),
            'last_update' => $this->integer(),
            'parent_id' => $this->integer(),
            'active' => $this->boolean(),
            'global_active' => $this->boolean()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('catalog_sections');
    }
}
