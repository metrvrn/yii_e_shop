<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_to_group`.
 */
class m180314_060710_create_user_to_group_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user_to_group', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'group_id' => $this->integer(),
            'created_at' => $this->integer(),
            'udated_at' => $this->integer()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user_to_group');
    }
}
