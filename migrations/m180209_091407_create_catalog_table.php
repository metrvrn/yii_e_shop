<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `catalog`.
 */
class m180209_091407_create_catalog_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('catalog', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'section_id' => $this->integer(),
            'picture' => $this->integer(),
            'description' => $this->text(),
            'xml_id' => $this->string()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('catalog');
    }
}
