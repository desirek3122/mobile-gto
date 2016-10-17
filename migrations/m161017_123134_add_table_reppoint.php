<?php

use yii\db\Migration;

class m161017_123134_add_table_reppoint extends Migration
{
    public function up()
    {
        $this->createTable('reppoint', array(
            'id'           => $this->primaryKey()->unique(),
            'header' => $this->string(),

        ));

    }

    public function down()
    {
       $this->dropTable('reppoint');
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
