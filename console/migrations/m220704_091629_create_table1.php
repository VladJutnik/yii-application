<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m220704_091629_create_table1
 */
class m220704_091629_create_table1 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('table1', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'content' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220704_091629_create_table1 cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220704_091629_create_table1 cannot be reverted.\n";

        return false;
    }
    */
}
