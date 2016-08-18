<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "custom_dates".
 *
 * @property integer $id
 * @property string $date
 * @property string $time_value
 * @property integer $price
 * @property integer $quest_id
 * @property integer $is_weekend
 * @property string $updated_at
 * @property string $created_at
 */
class CustomDate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'custom_dates';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['date', 'time_value', 'price'], 'required'],
            [['date'], 'required'],
            [['date', 'updated_at', 'created_at'], 'safe'],
            [['time_value'], 'number'],
            [['price', 'quest_id', 'is_weekend'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'time_value' => 'Time Value',
            'price' => 'Price',
            'quest_id' => 'Quest ID',
            'is_weekend' => 'Is Weekend',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
        ];
    }
}
