<?php

use yii\db\Migration;

/**
 * Handles the creation of table `catalog_prices`.
 */
class m180223_135809_create_catalog_prices_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('catalog_prices', 'type_id', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('catalog_prices');
    }
}
