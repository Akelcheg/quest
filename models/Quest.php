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
}
