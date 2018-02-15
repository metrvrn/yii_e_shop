<?php

use yii\db\Migration;

/**
 * Handles the creation of table `catalog_sections`.
 */
class m180215_073311_create_catalog_sections_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('catalog_sections', 'image_id', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('catalog_sections');
    }
}
