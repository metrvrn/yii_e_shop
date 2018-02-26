<?php

use yii\db\Migration;

/**
 * Handles the creation of table `basket_users`.
 */
class m180226_141323_create_basket_users_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('basket_users', [
            'id' => $this->primaryKey(),
            'b_user_id' => $this->integer(),
            'order_id' => $this->integer(),
            'product_id' => $this->integer(),
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
        $this->dropTable('basket_users');
    }
}
