<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_to_price`.
 */
class m180314_060802_create_user_to_price_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user_to_price', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'price_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user_to_price');
    }
}
