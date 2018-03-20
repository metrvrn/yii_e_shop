<?php

use yii\db\Migration;

/**
 * Handles the creation of table `prices_types`.
 */
class m180320_130132_create_prices_types_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('prices_types', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'xml_id' => $this->string(),
            'last_update' => $this->integer()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('prices_types');
    }
}
