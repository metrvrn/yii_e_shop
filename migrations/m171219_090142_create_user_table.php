<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m171219_090142_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'email' => $this->string(),
            'password' => $this->string(),
            'name' => $this->string(),
            'last_name' => $this->string(),
            'phone' => $this->string(),
            'work_phone' => $this->string(),
            'city' => $this->string(),
            'street' => $this->string(),
            'house_number' => $this->string(),
            'office_number' => $this->string()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user');
    }
}
