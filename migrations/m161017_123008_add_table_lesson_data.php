<?php

use yii\db\Migration;

class m161017_123008_add_table_lesson_data extends Migration
{
    public function up()
    {

        $this->createTable('lesson_data', array(
            'id'           => $this->primaryKey()->unique(),
            'lesson_id'      => $this->integer(),
            'exercise_id'=> $this->integer(),
            'data'=>$this->string(),
        ));
    }

    public function down()
    {
        $this->dropTable('lesson_data');
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
