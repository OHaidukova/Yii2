<?php

use yii\db\Migration;

/**
 * Class m181014_213707_create_table_users
 */
class m181014_213707_create_table_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'login' => $this->string(50)->notNull(),
            'password' => $this->string(100)->notNull(),
            'role' => $this->integer()->defaultValue(1),
        ]);

        $this->createIndex("index_users_login", "users", "login", true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181014_213707_create_table_users cannot be reverted.\n";

        return false;
    }
    */
}
