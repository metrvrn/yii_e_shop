<?php

use yii\db\Migration;

/**
 * Handles the creation of table `warehouse`.
 */
class m180321_060818_create_warehouse_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('warehouse', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'xml_id' => $this->string(),
            'last_update' => $this->integer()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('warehouse');
    }
}
