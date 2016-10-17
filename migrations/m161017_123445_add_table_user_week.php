<?php

use yii\db\Migration;

class m161017_123445_add_table_user_week extends Migration
{
    public function up()
    {
        $this->createTable('week', array(
            'id'           => $this->primaryKey()->unique(),
            'sub'      => $this->integer()->unsigned(),
            'header' => $this->string(),
            'datestart'        => $this->dateTime(),
            'audio1'=> $this->integer(),
            'audio2'=> $this->integer(),

        ));

    }

    public function down()
    {
        $this->dropTable('week');
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
