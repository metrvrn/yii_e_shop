<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_groups`.
 */
class m180314_061057_create_user_groups_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user_groups', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'description' => $this->text()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user_groups');
    }
}
