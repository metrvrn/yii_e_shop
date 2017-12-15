<?php

use yii\db\Migration;

/**
 * Handles the creation of table `data_block_property_type`.
 */
class m171215_123413_create_data_block_property_type_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('data_block_property_type', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('data_block_property_type');
    }
}
