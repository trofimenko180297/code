<?php

use yii\db\Migration;

class m170714_131013_tb_subscribe extends Migration
{
    public function safeUp()
    {

    }

    public function safeDown()
    {
        echo "m170714_131013_tb_subscribe cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->execute("
                CREATE TABLE `subscribe` (
          `idsubscribe` int(11) NOT NULL,
          `email` varchar(50) NOT NULL,
          `date_subscribe` date NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ");
    }

    public function down()
    {
       $this->dropTable('subscribe');
    }

}
