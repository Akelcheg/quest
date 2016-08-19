<?php

use yii\db\Schema;
use yii\db\Migration;

class m160818_170435_custom_dates extends Migration
{
    public function up()
    {
        $this->createTable('custom_dates', [
            'id' => Schema::TYPE_PK,

            'date' => Schema::TYPE_DATE . ' NOT NULL',
            'time_value' => Schema::TYPE_DECIMAL . '(6,2)',
            'price' => Schema::TYPE_INTEGER . '(5)',
            'quest_id' => Schema::TYPE_INTEGER,
            'is_weekend' => Schema::TYPE_INTEGER,

            'updated_at' => $this->timestamp() . ' DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP',
            'created_at' => $this->timestamp() . ' DEFAULT NOW()'
        ]);
    }

    public function down()
    {
        $this->dropTable('custom_dates');
    }
}
