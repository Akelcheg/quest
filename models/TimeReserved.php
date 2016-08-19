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
            [['time_value', 'date', 'price', 'quest_id', 'user_id'], 'required'],
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

    public function isBooked($time, $date, $quest_id)
    {
        return TimeReserved::find()->where(['time_value' => $time, 'date' => $date, 'quest_id' => $quest_id])->one();
    }

    public function userHasManyBookings()
    {
        $userId = Yii::$app->user->id;
        return Yii::$app->db->createCommand('SELECT count(*) as bookings FROM `time_reserved` WHERE user_id = ' . $userId . '
        and `date` > CURDATE()')->queryAll()[0]['bookings'] >= 2;
    }

    public function bookQuestTime($bookingObj)
    {
        $this->time_value = $bookingObj['time'];
        $this->date = $bookingObj['date'];;
        $this->price = $bookingObj['price'];
        $this->user_id = '1';
        $this->quest_id = $bookingObj['quest_id'];
        return $this->save();
    }

    public function getUserBookedQuests()
    {
        $userId = Yii::$app->user->id;
        return $this->findBySql("SELECT q.quest_holder as creator_id,q.id as quest_id,q.name,qt.price,time_reserved.date,time_reserved.time_value,time_reserved.price as reservedPrice,time_reserved.id FROM time_reserved
                                join quests as q on q.id = quest_id
                                join quests_times as qt on time_reserved.time_value = qt.time_value and qt.quest_id=q.id
                                WHERE user_id = " . $userId)->asArray()->all();
    }

}
