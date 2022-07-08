<?php

use yii\db\Migration;

/**
 * Class m220705_071544_ksl_stat_ip
 */
class m220705_071544_ksl_stat_ip extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        //Опции для mysql
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        //Создание таблицы IP пользователей
        $this->createTable('{{%ksl_ip_count}}', [
            'id' => $this->primaryKey(),
            'ip' => $this->string(15)->notNull(),
            'str_url' => $this->string(50),
            'date_ip' => $this->integer(),
            'black_list_ip' => $this->boolean()->defaultValue(0)->notNull(),
            'comment' => $this->string(50),
        ], $tableOptions);

        //Создание таблицы IP ботов
        $this->createTable('{{%ksl_ip_bots}}', [
            'id_bot' => $this->primaryKey(),
            'bot_ip' => $this->string(15)->notNull(),
            'str_url' => $this->string(50),
            'bot_name' => $this->string(30),
            'date' => $this->integer(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%ksl_ip_count}}');
        $this->dropTable('{{%ksl_ip_bots}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220705_071544_ksl_stat_ip cannot be reverted.\n";

        return false;
    }
    */
}
