<?php

use yii\db\Schema;
use yii\db\Migration;

class m160816_150732_quests_times extends Migration
{
    public function up()
    {

        $this->createTable('quests_times', [
            'id' => Schema::TYPE_PK,
            'time_value' => Schema::TYPE_DECIMAL . '(6,2) NOT NULL',
            'price' => Schema::TYPE_INTEGER . '(5) NOT NULL',
            'weekend_price' => Schema::TYPE_INTEGER . '(5) NOT NULL',
            'quest_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => $this->timestamp() . ' DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP',
            'created_at' => $this->timestamp() . ' DEFAULT NOW()'
        ]);
    }

    public function down()
    {
        $this->dropTable('quests_times');
    }

}
