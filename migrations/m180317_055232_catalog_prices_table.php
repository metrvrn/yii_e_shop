<?php

use yii\db\Migration;

/**
 * Class m180317_055232_catalog_prices_table
 */
class m180317_055232_catalog_prices_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('{{catalog_prices_types}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'created_at'=> $this->integer(),
            'updated_at' => $this->integer()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('{{catalog_prices_types}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180317_055232_catalog_prices_table cannot be reverted.\n";

        return false;
    }
    */
}
