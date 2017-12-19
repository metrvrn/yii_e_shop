<?php

use yii\db\Migration;

/**
 * Handles the creation of table `data_block_type`.
 */
class m171215_123211_create_data_block_type_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('data_block_type', [
            'id' => $this->primaryKey(),
            'name' => $this->string()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('data_block_type');
    }
}
