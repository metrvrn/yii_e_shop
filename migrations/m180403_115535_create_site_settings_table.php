<?php

use yii\db\Migration;

/**
 * Handles the creation of table `site_settings`.
 */
class m180403_115535_create_site_settings_table extends Migration
{
   
    private $initialData = [
        [
            'Название магазина',
            'Магазин'
        ],
        [
            'Краткое описание',
            'Канцелярских товаров'
        ],
    ];

    public function up()
    {
        $this->createTable('site_settings', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'data' => $this->text()
        ]);

        $this->batchInsert('site_settings', ['name', 'data'], $this->initialData);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('site_settings');
    }
}
