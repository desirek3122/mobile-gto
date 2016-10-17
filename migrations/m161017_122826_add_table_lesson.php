<?php

use yii\db\Migration;

class m161017_122826_add_table_lesson extends Migration
{
    public function up()
    {
        $this->createTable('lesson', array(
            'id'           => $this->primaryKey()->unique(),
            'sub'      => $this->integer()->notNull(),
            'header'        => $this->string(),
            'datestart'       => $this->dateTime(),
            'active'=> $this->integer(),

        ));


    }

    public function down()
    {
        $this->dropTable('lesson');
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
