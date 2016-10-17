<?php

use yii\db\Migration;

class m161017_121127_add_table_users extends Migration
{
    public function up()
    {
        $this->createTable('users', array(
            'id'           => $this->primaryKey()->unique(),
            'sub'      => $this->integer()->notNull(),
            'name' => $this->string(),
            'surname'        => $this->string(),
            'patronymic'       => $this->string(),
            'phone'  => $this->string(),
            'md5pass'=>$this->string(),
            'email' => $this->string()->unique(),
            'status'=> $this->integer(),
            'admin'=> $this->integer(),
            'secret_key'=>$this->string(),
            'auth_key'=>$this->string(),

        ));

    }

    public function down()
    {

        $this->dropTable('users');
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
