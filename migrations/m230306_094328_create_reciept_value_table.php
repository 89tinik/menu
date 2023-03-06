<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%reciept_value}}`.
 */
class m230306_094328_create_reciept_value_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%reciept_value}}', [
            'id' => $this->primaryKey(),
            'menu_id' => $this->integer(),
            'reciept_id' => $this->integer(),
        ], 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB');

        $this->createIndex(
            'idx-reciept_value-menu_id',
            '{{%reciept_value}}',
            'menu_id'
        );

        $this->addForeignKey(
            'fk-reciept_value-menu_id',
            '{{%reciept_value}}',
            'menu_id',
            'menu',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-reciept_value-reciept_id',
            '{{%reciept_value}}',
            'reciept_id'
        );

        $this->addForeignKey(
            'fk-reciept_value-reciept_id',
            '{{%reciept_value}}',
            'reciept_id',
            'reciept',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%reciept_value}}');
    }
}
