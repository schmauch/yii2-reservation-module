<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%customer}}`.
 */
class m230406_085638_create_customers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%customers}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'firstname' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'street' => $this->string()->notNull(),
            'zip' => $this->string()->notNull(),
            'town' => $this->string()->notNull(),
            'phone' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
        ]);
        
        $this->createIndex(
            'idx-customers-user_id',
            'customers',
            'user_id'
        );
        
        $this->addForeignKey(
            'fk-customers-user_id',
            'customers',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-customers-user_id',
            'customers'
        );
        
        $this->dropIndex(
            'idx-customers-user_id',
            'customers'
        );
        
        $this->dropTable('{{%customers}}');
    }
}
