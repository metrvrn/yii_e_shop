<?php

use yii\db\Migration;

/**
 * Handles the creation of table `products`.
 */
class m180319_092510_create_products_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('products', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'section_id' => $this->integer(),
            'xml_id' => $this->string(),
            'preview_text' => $this->text(),
            'detail_text' => $this->text(),
            'picture_id' => $this->integer(),
            'last_update' => $this->integer()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('products');
    }
}
