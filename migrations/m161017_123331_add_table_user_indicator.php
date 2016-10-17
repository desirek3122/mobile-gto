<?php

use yii\db\Migration;

class m161017_123331_add_table_user_indicator extends Migration
{
    public function up()
    {

        $this->createTable('user_indicator', array(
            'id'           => $this->primaryKey()->unique(),
            'user_id'      => $this->integer(),
            'indicator_id'=> $this->integer(),
        ));
    }

    public function down()
    {
        $this->dropTable('user_indicator');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
