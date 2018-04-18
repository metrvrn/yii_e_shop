<?php

use yii\db\Migration;

/**
 * Handles the creation of table `basket`.
 */
class m180307_074438_create_basket_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('basket', [
            'id' => $this->primaryKey(),
            'b_user_id' => $this->string(),
            'order_id' => $this->integer(),
            'product_id' => $this->integer(),
            'name' => $this->string(),
            'price' => $this->float(),
            'quantity' => $this->integer(),
            'date_insert' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'date_update' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('basket');
    }
}
