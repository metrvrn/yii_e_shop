<?php

use yii\db\Migration;

/**
 * Handles the creation of table `basket_users`.
 */
class m180227_063725_create_basket_users_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('basket_users', [
            'id' => $this->primaryKey(),
            'identity_key' => $this->string(),
            'user_id' => $this->integer()
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
