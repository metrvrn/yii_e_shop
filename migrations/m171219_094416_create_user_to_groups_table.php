<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_to_groups`.
 */
class m171219_094416_create_user_to_groups_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user_to_groups', [
            'id' => $this->primaryKey(),
            'group_id' => $this->integer(),
            'user_id' => $this->integer()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user_to_groups');
    }
}
