<?php

namespace app\modules\api\controllers;

use app\models\Quest;
use app\models\TimeReserved;
use Yii;
use yii\filters\ContentNegotiator;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\Response;

/**
 * Default controller for the `api` module
 */
class BookingController extends Controller
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

        /*$behaviors['verbs'] = [
            'class' => VerbFilter::className(),
            'actions' => [
                'book' => ['post'],
            ],
        ];*/

        return $behaviors;
    }


    public function actionBook()
    {
        $userBooking = new TimeReserved();
        $bookingObj = Yii::$app->request->post();
        return $userBooking->bookQuestTime($bookingObj);
    }
}
