<?php

use yii\db\Migration;

/**
 * Handles the creation of table `store_type`.
 */
class m171215_123541_create_store_type_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('store_type', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('store_type');
    }
}
