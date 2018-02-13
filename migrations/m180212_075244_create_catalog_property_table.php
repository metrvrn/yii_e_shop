<?php

use yii\db\Migration;

/**
 * Handles the creation of table `catalog_property`.
 */
class m180212_075244_create_catalog_property_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('catalog_property', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'property_id' => $this->integer()->notNull(),
            'value' => $this->string()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('catalog_property');
    }
}
