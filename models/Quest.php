<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quests".
 *
 * @property integer $id
 * @property string $name
 * @property integer $price_average
 * @property integer $price_holiday
 * @property integer $people
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
            [['name', 'price_average', 'price_holiday', 'people'], 'required'],
            [['price_average', 'price_holiday', 'people'], 'integer'],
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
            'price_average' => 'Price Average',
            'price_holiday' => 'Price Holiday',
            'people' => 'People',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
        ];
    }
}
