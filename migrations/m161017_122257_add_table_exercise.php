<?php

use yii\db\Migration;

class m161017_122257_add_table_exercise extends Migration
{
    public function up()
    {
        $this->createTable('exercise', array(
            'id'           => $this->primaryKey()->unique(),
            'sub'      => $this->integer()->notNull(),
            'header' => $this->string(),
            'description'        => $this->string(),
            'img'=> $this->integer(),

        ));

    }

    public function down()
    {
        $this->dropTable('exercise');
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
