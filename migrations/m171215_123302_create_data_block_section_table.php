<?php

use yii\db\Migration;

/**
 * Handles the creation of table `data_block_section`.
 */
class m171215_123302_create_data_block_section_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('data_block_section', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('data_block_section');
    }
}
