<?php

use yii\db\Migration;

/**
 * Handles the creation of table `properties_types`.
 */
class m180319_102404_create_properties_types_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('properties_types', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'xml_code' => $this->string(),
            'last_update' => $this->integer()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('properties_types');
    }
}
