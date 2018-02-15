<?php

use yii\db\Migration;

/**
 * Handles the creation of table `files`.
 */
class m180215_075044_create_files_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('files', 'type_id', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('files');
    }
}
