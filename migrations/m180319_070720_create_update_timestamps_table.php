<?php

use yii\db\Migration;

/**
 * Handles the creation of table `update_timestamps`.
 */
class m180319_070720_create_update_timestamps_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('update_timestamps', [
            'id' => $this->primaryKey(),
            'type' => $this->string(),
            'last_update' => $this->integer()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('update_timestamps');
    }
}
