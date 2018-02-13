<?php

use yii\db\Migration;

/**
 * Handles the creation of table `catalog_store_type`.
 */
class m180213_072842_create_catalog_store_type_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('catalog_store_type', [
            'id' => $this->primaryKey(),
            'store_id' => $this->integer()->notNull(),
            'name' => $this->string()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('catalog_store_type');
    }
}
