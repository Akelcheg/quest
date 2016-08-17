<?php

namespace app\controllers;

use app\models\SignupForm;
use Yii;
use yii\filters\AccessControl;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\ContentNegotiator;
use app\models\LoginForm;
use yii\rest\Controller;
use yii\web\Response;

class ApiController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::className(),
            'only' => ['private'],
        ];
        $behaviors['contentNegotiator'] = [
            'class' => ContentNegotiator::className(),
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ],
        ];
        $behaviors['access'] = [
            'class' => AccessControl::className(),
            'only' => ['private'],
            'rules' => [
                [
                    'actions' => ['private'],
                    'allow' => true,
                    'roles' => ['@'],
                ],
            ],
        ];
        return $behaviors;
    }

    public function actionLogin()
    {
        $model = new LoginForm();
        if ($model->load(Yii::$app->getRequest()->getBodyParams(), '') && $model->validate()) {
            if ($model->login())
                return ['access_token' => Yii::$app->user->identity->getAuthKey()];
        } else {
            return $model;
        }

    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->getRequest()->getBodyParams(), '') && $model->validate()) {

            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return ['access_token' => Yii::$app->user->identity->getAuthKey()];
                }
            }

        }

        return $model;
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionPrivate()
    {
        return 'hi';
    }

}
