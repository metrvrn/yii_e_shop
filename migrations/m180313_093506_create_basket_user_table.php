<?php

use yii\db\Migration;

/**
 * Handles the creation of table `basket_user`.
 */
class m180313_093506_create_basket_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('basket_user', [
            'id' => $this->primaryKey(),
            'basket_key' => $this->string()->notNull(),
            'user_id' => $this->integer(),
            'active' => $this->boolean()->defaultValue(true),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('basket_user');
    }
}
