<?php

use yii\db\Schema;
use yii\db\Migration;

class m160818_170225_time_reserved extends Migration
{
    public function up()
    {

        $this->createTable('time_reserved', [
            'id' => Schema::TYPE_PK,
            'time_value' => Schema::TYPE_DECIMAL . '(6,2) NOT NULL',
            'date' => Schema::TYPE_DATE . ' NOT NULL',
            'price' => Schema::TYPE_INTEGER . '(5) NOT NULL',
            'quest_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'user_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
        ]);
    }

    public function down()
    {
        $this->dropTable('time_reserved');
    }

}
