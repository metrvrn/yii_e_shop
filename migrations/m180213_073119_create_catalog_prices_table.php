<?php

use yii\db\Migration;

/**
 * Handles the creation of table `catalog_prices`.
 */
class m180213_073119_create_catalog_prices_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('catalog_prices', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'value' => $this->float()->notNull()
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
