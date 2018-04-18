<?php

use yii\db\Migration;

/**
 * Handles the creation of table `site_properties`.
 */
class m180404_065142_create_site_properties_table extends Migration
{
   
    private $initialData = [
        [
            'Название магазина',
            'store_name',
            'Магазин'
        ],
        [
            'Краткое описание',
            'description',
            'Канцелярских товаров'
        ],
        [
            'О компании',
            'about',
            'Информация о компании'
        ],
        [
            'Оплата и доставка',
            'delivery',
            'Информация по оплате и доставке'
        ]
    ];

    public function up()
    {
        $this->createTable('site_properties', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'code' => $this->string(),
            'data' => $this->text()
        ]);

        $this->batchInsert('site_properties', ['name', 'code', 'data'], $this->initialData);
    }


    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('site_properties');
    }
}
