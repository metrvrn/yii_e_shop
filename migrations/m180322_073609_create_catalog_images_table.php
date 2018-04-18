<?php

use yii\db\Migration;

/**
 * Handles the creation of table `catalog_images`.
 */
class m180322_073609_create_catalog_images_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('catalog_images', [
            'id' => $this->primaryKey(),
            'image_id' => $this->integer(),
            'path' => $this->string()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('catalog_images');
    }
}
