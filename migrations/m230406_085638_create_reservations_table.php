<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%customer}}`.
 */
class m230406_085638_create_reservations_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%reservations}}', [
            'id' => $this->primaryKey(),
            'model_class' => $this->string()->notNull(),
            'model_id' => $this->integer(),
            'date' => $this->date()->notNull(),
            'time' => $this->time(),
            'duration' => $this->integer(),
            'user_id' => $this->integer(),
            'status' => $this->integer()->notNull()->defaultValue(0),
            'created_at' => $this->dateTime()->notNull()->defaultExpression('NOW()'),
            'updated_at' => $this->dateTime()->notNull(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%reservations}}');
    }
}
