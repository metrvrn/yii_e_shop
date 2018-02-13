<?php

use yii\db\Migration;

/**
 * Handles the creation of table `catalog_quantity`.
 */
class m180213_072932_create_catalog_quantity_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('catalog_quantity', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'value' => $this->integer()->notNull(),
            'store_id' => $this->integer()->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('catalog_quantity');
    }
}
