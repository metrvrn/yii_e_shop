<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_group`.
 */
class m180410_064827_create_user_group_table extends Migration
{

    private $data = [
        ['Пользователь'],
        ['Менеджер'],
        ['Администратор']
    ];
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user_group', [
            'id' => $this->primaryKey(),
            'name' => $this->string()
        ]);
        
        $this->batchInsert('user_group', ['name'], $this->data);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user_group');
    }
}
