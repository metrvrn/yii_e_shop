<?php

use yii\db\Migration;

/**
 * Handles the creation of table `file`.
 */
class m171219_084608_create_file_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('file', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'path' => $this->string(),
            'type_id' => $this->integer()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('file');
    }
}
