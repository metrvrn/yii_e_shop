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
