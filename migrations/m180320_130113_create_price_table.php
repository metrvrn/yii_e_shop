<?php

use yii\db\Migration;

/**
 * Handles the creation of table `price`.
 */
class m180320_130113_create_price_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('price', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'type_id' => $this->integer(),
            'value' => $this->float(),
            'last_update' => $this->integer()
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
