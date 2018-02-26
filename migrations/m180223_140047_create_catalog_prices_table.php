<?php

use yii\db\Migration;

/**
 * Handles the creation of table `catalog_prices`.
 */
class m180223_140047_create_catalog_prices_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('catalog_prices', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'type_id' => $this->integer(),
            'value' => $this->float()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('catalog_prices');
    }
}
