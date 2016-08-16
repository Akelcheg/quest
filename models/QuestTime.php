<?php

namespace app\models;

use DateInterval;
use Yii;

/**
 * This is the model class for table "quests_times".
 *
 * @property integer $id
 * @property string $time_value
 * @property integer $price
 * @property integer $weekend_price
 * @property integer $quest_id
 * @property string $updated_at
 * @property string $created_at
 */
class QuestTime extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quests_times';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['time_value', 'price', 'weekend_price', 'quest_id'], 'required'],
            [['time_value'], 'number'],
            [['price', 'weekend_price', 'quest_id'], 'integer'],
            [['updated_at', 'created_at'], 'safe'],
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
            'price' => 'Price',
            'weekend_price' => 'Weekend Price',
            'quest_id' => 'Quest ID',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
        ];
    }

    public function generateTimeLine($from, $to, $rest)
    {
        return $this->fillTimeArray($from, $to, $rest);
    }

    public function fillTimeArray($from, $to, $rest)
    {
        $newDate = null;
        $timeArray = [];
        $restArray = explode(':', $rest);
        if (strpos($rest, ':') !== false) {

            $newDate = strtotime('+' . $restArray[0] . ' hours', $from);
            $newDate = strtotime('+' . $restArray[1] . ' minutes', $newDate);

            while ($to >= $newDate) {
                array_push($timeArray, date("H:i", $newDate));
                $newDate = strtotime('+' . $restArray[0] . ' hours', $newDate);
                $newDate = strtotime('+' . $restArray[1] . ' minutes', $newDate);
            }

        } else {

            $newDate = strtotime('+' . $restArray[0] . ' minutes', $from);

            while ($to >= $newDate) {
                array_push($timeArray, date("H:i", $newDate));

                $newDate = strtotime('+' . $restArray[0] . ' minutes', $newDate);
            }
        }

        return $timeArray;
    }
}
