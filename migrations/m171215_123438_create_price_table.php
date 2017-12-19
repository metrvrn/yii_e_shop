<?php

use yii\db\Migration;

/**
 * Handles the creation of table `price`.
 */
class m171215_123438_create_price_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('price', [
            'id' => $this->primaryKey(),
            'value' => $this->float(),
            'element_id' => $this->integer(),
            'price_type_id' => $this->integer()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('price');
    }
}
