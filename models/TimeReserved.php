<?php

namespace app\models;

use app\models\BookingHistory;

use Yii;

/**
 * This is the model class for table "time_reserved".
 *
 * @property integer $id
 * @property string $time_value
 * @property string $date
 * @property integer $price
 * @property integer $quest_id
 * @property integer $user_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class TimeReserved extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'time_reserved';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['time_value', 'date', 'price', 'quest_id', 'user_id', 'created_at', 'updated_at'], 'required'],
            [['time_value'], 'number'],
            [['date'], 'safe'],
            [['price', 'quest_id', 'user_id', 'created_at', 'updated_at'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'time_value' => 'Time Value',
            'date' => 'Date',
            'price' => 'Price',
            'quest_id' => 'Quest ID',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

}
