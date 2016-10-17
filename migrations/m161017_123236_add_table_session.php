<?php

use yii\db\Migration;

class m161017_123236_add_table_session extends Migration
{
    public function up()
    {
        $this->createTable('session', array(
            'id'           => $this->primaryKey()->unique(),
            'header' => $this->string(),
            'datestart'        => $this->dateTime(),

        ));

    }

    public function down()
    {
        $this->dropTable('session');
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
