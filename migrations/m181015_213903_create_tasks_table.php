<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tasks`.
 */
class m181015_213903_create_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tasks', [
            'id' => $this->primaryKey(),
            'number' => $this->string(50)->notNull(),
            'name' => $this->string(50)->notNull(),
            'details' => $this->string(500),
            'id_developer' => $this->integer(),
            'date_create' => $this->dateTime(),
            'date_resolve' => $this->date(),
            'id_status' => $this->integer(),
            'date_change' => $this->dateTime(),
            'img' => $this->string(200),
        ]);

        $this->createIndex("index_number", "tasks", "number", true);
        $this->createIndex("index_id_developer", "tasks", "id_developer", false);
        $this->addForeignKey('fk_tasks_users', 'tasks','id_developer', 'users', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tasks');
    }
}
