<?php

namespace app\modules\api\controllers;

use app\models\Quest;
use yii\filters\ContentNegotiator;
use yii\web\Controller;
use yii\web\Response;

/**
 * Default controller for the `api` module
 */
class QuestController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['contentNegotiator'] = [
            'class' => ContentNegotiator::className(),
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ],
        ];

        return $behaviors;
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionList()
    {
        return Quest::find()->orderBy('id desc')->all();
    }

    public function actionDesc($quest_name)
    {
        $questId = $quest_name;

        return [
            'data' => Quest::findOne(['id' => $questId]),
            'booking_data' => Quest::getQuestSchedule($questId)
        ];
    }
}
