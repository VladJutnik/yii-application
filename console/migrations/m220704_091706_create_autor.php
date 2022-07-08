<?php

use console\traits\UuidTypeTrait;
use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m220704_091706_create_autor
 */
class m220704_091706_create_autor extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%autor}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'name2' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220704_091706_create_autor cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220704_091706_create_autor cannot be reverted.\n";

        return false;
    }
    */
}
