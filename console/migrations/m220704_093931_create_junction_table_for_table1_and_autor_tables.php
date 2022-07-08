<?php

use console\traits\UuidTypeTrait;
use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `{{%table1_autor}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%table1}}`
 * - `{{%autor}}`
 */
class m220704_093931_create_junction_table_for_table1_and_autor_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%table1_autor}}', [
            'table1_id' => $this->integer(),
            'autor_id' => $this->integer(),
            'PRIMARY KEY(table1_id, autor_id)',
        ]);

        // creates index for column `table1_id`
        $this->createIndex(
            '{{%idx-table1_autor-table1_id}}',
            '{{%table1_autor}}',
            'table1_id'
        );

        // add foreign key for table `{{%table1}}`
        $this->addForeignKey(
            '{{%fk-table1_autor-table1_id}}',
            '{{%table1_autor}}',
            'table1_id',
            '{{%table1}}',
            'id',
            'CASCADE'
        );

        // creates index for column `autor_id`
        $this->createIndex(
            '{{%idx-table1_autor-autor_id}}',
            '{{%table1_autor}}',
            'autor_id'
        );

        // add foreign key for table `{{%autor}}`
        $this->addForeignKey(
            '{{%fk-table1_autor-autor_id}}',
            '{{%table1_autor}}',
            'autor_id',
            '{{%autor}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%table1}}`
        $this->dropForeignKey(
            '{{%fk-table1_autor-table1_id}}',
            '{{%table1_autor}}'
        );

        // drops index for column `table1_id`
        $this->dropIndex(
            '{{%idx-table1_autor-table1_id}}',
            '{{%table1_autor}}'
        );

        // drops foreign key for table `{{%autor}}`
        $this->dropForeignKey(
            '{{%fk-table1_autor-autor_id}}',
            '{{%table1_autor}}'
        );

        // drops index for column `autor_id`
        $this->dropIndex(
            '{{%idx-table1_autor-autor_id}}',
            '{{%table1_autor}}'
        );

        $this->dropTable('{{%table1_autor}}');
    }
}
