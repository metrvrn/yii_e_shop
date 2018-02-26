<?php

use yii\db\Migration;

/**
 * Handles the creation of table `catalog_stores_types`.
 */
class m180223_143206_create_catalog_stores_types_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('catalog_stores_types', [
            'id' => $this->primaryKey(),
            'store_id' => $this->integer(),
            'name' => $this->string(),
            'address' => $this->string()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('catalog_stores_types');
    }
}
