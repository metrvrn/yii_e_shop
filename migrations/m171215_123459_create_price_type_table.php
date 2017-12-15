<?php

use yii\db\Migration;

/**
 * Handles the creation of table `price_type`.
 */
class m171215_123459_create_price_type_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('price_type', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('price_type');
    }
}
