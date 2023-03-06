<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%reciept}}`.
 */
class m230306_093542_create_reciept_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%reciept}}', [
            'id' => $this->primaryKey(),
            'table' => $this->string(255),
            'date' => $this->date(),
        ], 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%reciept}}');
    }
}
