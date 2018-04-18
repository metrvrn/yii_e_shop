<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m180409_115913_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'auth_key' => $this->string(),
            'email' => $this->string(),
            'password' => $this->string(),
            'name' => $this->string(),
            'surname' => $this->string(),
            'patronymic' => $this->string(),
            'company' => $this->string(),
            'phone' => $this->string(),
            'work_phone' => $this->string(),
            'city' => $this->string(),
            'street' => $this->string(),
            'house_number' => $this->string(),
            'office_number' => $this->string(),
            'price_id' => $this->integer(),
            'group_id' => $this->integer()
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
