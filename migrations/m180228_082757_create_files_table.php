<?php

use yii\db\Migration;

/**
 * Handles the creation of table `files`.
 */
class m180228_082757_create_files_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('files', [
            'id' => $this->primaryKey(),
            'file_id' => $this->integer(),
            'subfolder' => $this->string(),
            'name' => $this->string(),
            'type_id' => $this->integer(),
            'date_insert' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'date_update' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')
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
