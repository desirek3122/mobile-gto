<?php

use yii\db\Migration;

class m161017_122414_add_table_group extends Migration
{
    public function up()
    {
        $this->createTable('group', array(
            'id'           => $this->primaryKey()->unique()->unsigned(),
            'header'        => $this->string(),
        ));
    }

    public function down()
    {
       $this->dropTable('group');
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
