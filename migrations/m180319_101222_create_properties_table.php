<?php

use yii\db\Migration;

/**
 * Handles the creation of table `properties`.
 */
class m180319_101222_create_properties_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('properties', [
            'id' => $this->primaryKey(),
            'property_id' => $this->integer(),
            'product_id' => $this->integer(),
            'value' => $this->string()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('properties');
    }
}
