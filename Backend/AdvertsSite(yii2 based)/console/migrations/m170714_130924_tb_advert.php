<?php

use yii\db\Migration;

class m170714_130924_tb_advert extends Migration
{
    public function safeUp()
    {

    }

    public function safeDown()
    {
        echo "m170714_130924_tb_advert cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->execute("
                    CREATE TABLE `advert` (
              `idadvert` int(11) NOT NULL,
              `price` mediumint(11) NOT NULL,
              `address` varchar(255) NOT NULL,
              `fk_agent_detail` mediumint(11) NOT NULL,
              `bedroom` smallint(1) NOT NULL,
              `livingroom` smallint(1) NOT NULL,
              `parking` smallint(1) NOT NULL,
              `kitchen` smallint(1) NOT NULL,
              `general_image` varchar(200) NOT NULL,
              `description` text NOT NULL,
              `location` varchar(30) NOT NULL,
              `hot` smallint(1) NOT NULL,
              `sold` smallint(1) NOT NULL,
              `type` varchar(50) NOT NULL,
              `recommend` smallint(1) NOT NULL,
              `created_at` int(11) NOT NULL,
              `updated_at` int(11) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ");
    }

    public function down()
    {
        $this->dropTable('advert');
    }

}
