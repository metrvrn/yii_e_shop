<?php

use yii\db\Migration;

/**
 * Handles the creation of table `files_type`.
 */
class m180215_074934_create_files_type_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('files_type', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('files_type');
    }
}
