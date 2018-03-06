<?php

use yii\db\Migration;

/**
 * Handles the creation of table `catalog_sections`.
 */
class m180214_125534_create_catalog_sections_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('catalog_sections', [
            'id' => $this->primaryKey(),
            'section_id' => $this->integer()->notNull(),
            'parent_id' => $this->integer(),
            'name' => $this->string()->notNull(),
            'xml_id' => $this->string(),
            'depth_level' => $this->integer(),
            'image_id' => $this->integer()
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
