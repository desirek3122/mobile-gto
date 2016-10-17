<?php

use yii\db\Migration;

class m161017_122642_add_table_indicator extends Migration
{
    public function up()
    {
        $this->createTable('indicator', array(
            'id'=> $this->primaryKey()->unique(),
            'header' => $this->string(),
            'headershort'=> $this->string(),
            'unit'=> $this->string(),
            'type'=> $this->integer(),
        ));

    }

    public function down()
    {
      $this->dropTable('indicator');
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
