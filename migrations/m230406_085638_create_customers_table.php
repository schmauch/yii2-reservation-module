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
        
        $this->createTable('{{%rooms}}', [
            'id' => $this->primaryKey(),
            'room' => $this->string()->notNull(),
            'location' => $this->string(),
        ]);
        
        $this->createTable('{{%reservations}}', [
            'id' => $this->primaryKey(),
            'status' => $this->integer()->notNull()->defaultValue(0),
            'created_at' => $this->dateTime()->notNull()->defaultExpression('NOW()'),
            'confirmed_at' => $this->dateTime()->notNull(),
            'date' => $this->date()->notNull(),
            'time' => $this->time(),
            'duration' => $this->integer(),
            'customer_id' => $this->integer(),
            'room_id' => $this->integer(),
        ]);

        $this->addForeignKey(
            'fk-reservations-customer_id',
            'reservations',
            'customer_id',
            'customers',
            'id',
            'CASCADE'
        );
        
        $this->addForeignKey(
            'fk-reservations-room_id',
            'reservations',
            'room_id',
            'rooms',
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
