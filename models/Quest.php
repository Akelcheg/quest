<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quests".
 *
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property integer $people
 * @property integer $is_open
 * @property string $description
 * @property integer $passing_percentage
 * @property integer $quest_holder
 * @property string $updated_at
 * @property string $created_at
 */
class Quest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quests';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'people', 'image', 'is_open', 'description', 'passing_percentage', 'quest_holder'], 'required'],
            [['people', 'is_open', 'passing_percentage', 'quest_holder'], 'integer'],
            [['image', 'description'], 'string'],
            [['updated_at', 'created_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'image' => 'Фото квеста',
            'people' => 'People',
            'is_open' => 'Is Open',
            'description' => 'Description',
            'passing_percentage' => 'Passing Percentage',
            'quest_holder' => 'Quest Holder',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
        ];
    }

    public static function getQuestSchedule($questId)
    {
        $customDates = new CustomDate();
        $datesArray = Yii::$app->db->createCommand('select * from custom_dates where
        quest_id = ' . $questId . ' or quest_id = 0')->queryAll();

        $bookingArray = [];
        $daysNumber = 14;
        $bookingData = ['date' => '', 'time' => [], 'price' => ''];
        $timeData = ['value' => '', 'is_booked' => ''];

        $bookedTimeArray = TimeReserved::findAll(['quest_id' => $questId]);

        $questTimeArray = Yii::$app->db->createCommand('select * from quests_times where
        quest_id = ' . $questId . ' order by time_value')->queryAll();

        for ($i = 0; $i < $daysNumber; $i++) {

            $currentDate = date('Y-m-d', strtotime("+" . $i . " days"));
            $bookingData['date'] = $currentDate;

            array_push($bookingArray, $bookingData);

            foreach ($questTimeArray as $questTime) {
                $t = new \DateTime($bookingData['date'] . ' ' . $questTime['time_value']);
                $t2 = new \DateTime("now+1hour");

                if (count($bookedTimeArray) > 0) {
                    foreach ($bookedTimeArray as $bookedTime) {

                        $timeData['value'] = $questTime['time_value'];
                        $timeData['price'] = $questTime['price'];

                        if (($bookedTime['time_value'] == $questTime['time_value'] &&
                                $bookedTime['date'] == $currentDate) ||
                            ($t < $t2)
                        ) {
                            $timeData['is_booked'] = 'true';
                            break;
                        } else {
                            $timeData['is_booked'] = 'false';
                        }
                    }
                } else {
                    if ($t < $t2) {
                        $timeData['is_booked'] = 'true';
                    } else $timeData['is_booked'] = 'false';
                    $timeData['value'] = $questTime['time_value'];
                    $timeData['price'] = $questTime['price'];
                }

                if (date('N', strtotime($currentDate)) >= 6) {
                    $timeData['price'] = $questTime['weekend_price'];
                }

                foreach ($datesArray as $customDate) {

                    if ($customDate['date'] == $currentDate) {
                        if ($customDate['price']) {
                            if ($customDate['time_value']) {
                                if ($questTime['time_value'] == $customDate['time_value']) {
                                    $timeData['price'] = $customDate['price'];
                                }
                            } else $timeData['price'] = $customDate['price'];
                        } elseif (!$customDate['price'] && $customDate['is_weekend'] == 1) {
                            if ($customDate['time_value']) {
                                if ($questTime['time_value'] == $customDate['time_value']) {
                                    $timeData['price'] = $questTime['weekend_price'];
                                }
                            } else $timeData['price'] = $questTime['weekend_price'];
                        } elseif ($customDate['is_weekend'] == 0) {
                            $timeData['price'] = $questTime['price'];
                        }

                    }
                }
                array_push($bookingArray[$i]['time'], $timeData);
            }
        }

        return $bookingArray;
    }
}
