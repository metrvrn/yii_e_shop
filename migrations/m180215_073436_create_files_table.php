<?php

use yii\db\Migration;

/**
 * Handles the creation of table `files`.
 */
class m180215_073436_create_files_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('files', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'path' => $this->string()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('files');
    }
}
