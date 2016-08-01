<?php

use yii\db\Migration;
use yii\db\Schema;

class m160801_153651_quests extends Migration
{
    public function up()
    {
        $this->createTable('quests', [
            'id' => 'pk',
            'name' => Schema::TYPE_STRING . '(255) NOT NULL',
            'price_average' => Schema::TYPE_INTEGER . '(6) NOT NULL',
            'price_holiday' => Schema::TYPE_INTEGER . '(6) NOT NULL',
            'people' => Schema::TYPE_INTEGER . '(3) NOT NULL',

            'updated_at' => $this->timestamp()->defaultValue(null),
            'created_at' => $this->dateTime() . ' DEFAULT NOW()'
        ]);

    }

    public function down()
    {
        echo "m160801_153651_quests cannot be reverted.\n";
        $this->dropTable('quests');
    }
}
