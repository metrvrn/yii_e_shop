<?php

use yii\db\Migration;

/**
 * Handles the creation of table `order`.
 */
class m180406_112715_create_order_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('order', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'user_name' => $this->string(),
            'user_surname' => $this->string(),
            'user_patronymic' => $this->string(),
            'user_company' => $this->string(),
            'user_phone' => $this->string(),
            'user_workphone' => $this->string(),
            'user_email' => $this->string(),
            'delivery_name' => $this->string(),
            'delivery_description' => $this->text(),
            'delivery_city' => $this->string(),
            'delivery_street' => $this->string(),
            'delivery_house_number' => $this->string(),
            'delivery_office_number' => $this->string(),
            'payment_name' => $this->string(),
            'payment_description' => $this->text(),
            'products_number' => $this->integer(),
            'sum' => $this->float(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('order');
    }
}
