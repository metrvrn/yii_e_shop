<?php

use yii\db\Migration;

/**
 * Handles the creation of table `data_block_element`.
 */
class m171215_123236_create_data_block_element_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('data_block_element', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('data_block_element');
    }
}
