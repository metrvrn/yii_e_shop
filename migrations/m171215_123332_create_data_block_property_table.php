<?php

use yii\db\Migration;

/**
 * Handles the creation of table `data_block_property`.
 */
class m171215_123332_create_data_block_property_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('data_block_property', [
            'id' => $this->primaryKey(),
            'value' => $this->text(),
            'element_id' => $this->integer(),
            'property_type_id' => $this->integer()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('data_block_property');
    }
}
