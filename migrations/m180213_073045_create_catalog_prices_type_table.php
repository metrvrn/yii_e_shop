<?php

use yii\db\Migration;

/**
 * Handles the creation of table `catalog_prices_type`.
 */
class m180213_073045_create_catalog_prices_type_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('catalog_prices_type', [
            'id' => $this->primaryKey(),
            'price_id' => $this->integer()->notNull(),
            'name' => $this->string()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('catalog_prices_type');
    }
}
