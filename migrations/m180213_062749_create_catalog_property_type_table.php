<?php

use yii\db\Migration;

/**
 * Handles the creation of table `catalog_property_type`.
 */
class m180213_062749_create_catalog_property_type_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('catalog_property_type', [
            'id' => $this->primaryKey(),
            'property_type_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('catalog_property_type');
    }
}
