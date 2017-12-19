<?php

use yii\db\Migration;

/**
 * Handles the creation of table `store`.
 */
class m171215_123516_create_store_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('store', [
            'id' => $this->primaryKey(),
            'quantity' => $this->float(),
            'element_id' => $this->integer(),
            'store_type_id' => $this->integer()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('store');
    }
}
