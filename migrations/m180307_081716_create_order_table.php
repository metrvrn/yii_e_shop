<?php

use yii\db\Migration;

/**
 * Handles the creation of table `order`.
 */
class m180307_081716_create_order_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('order', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'basket_user_id' => $this->string(),
            'sum' => $this->float(),
            'user_comment' => $this->string(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->string()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('order');
    }
}
