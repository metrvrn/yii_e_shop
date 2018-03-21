<?php

use yii\db\Migration;

/**
 * Handles the creation of table `quantity`.
 */
class m180321_060729_create_quantity_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('quantity', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'warehouse_id' => $this->integer(),
            'value' => $this->float()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('quantity');
    }
}
