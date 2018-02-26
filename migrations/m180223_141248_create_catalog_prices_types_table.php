<?php

use yii\db\Migration;

/**
 * Handles the creation of table `catalog_prices_types`.
 */
class m180223_141248_create_catalog_prices_types_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('catalog_prices_types', [
            'id' => $this->primaryKey(),
            'price_id' => $this->integer(),
            'name' => $this->string(),
            'xml_id' => $this->string()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('catalog_prices_types');
    }
}
