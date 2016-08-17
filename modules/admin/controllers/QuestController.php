<?php

namespace app\modules\admin\controllers;

use app\models\QuestTime;
use Yii;
use app\models\Quest;
use app\models\QuestSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * QuestController implements the CRUD actions for Quest model.
 */
class QuestController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Quest models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new QuestSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Quest model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Quest model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Quest();
        $questTime = new QuestTime();
        $timePriceArray = [];
        if (!Yii::$app->request->post('time-price'))
            //$timePriceArray = [];
            $x = Yii::$app->request->post('time-price');
        //else $timePriceArray = Yii::$app->request->post('time-price');

        //var_dump(Yii::$app->request->post());
        //$x = $questTime->generateTimeLine(strtotime($timeFrom), strtotime($timeTo), $timeRest);
        //if (Yii::$app->request->post('time-rest') && Yii::$app->request->post('time-from') && Yii::$app->request->post('time-from')) {


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {

            return $this->render('create', [
                'model' => $model,
                'questTime' => $questTime,
                'timePriceArray' => $timePriceArray
            ]);
        }
    }

    /**
     * Updates an existing Quest model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $questTime = new QuestTime();

        //var_dump($timePriceArray);
        //$timePriceArray = [];

        $timePriceArray = QuestTime::find()->where(['quest_id' => $id])->orderBy('id')->all();
        if (Yii::$app->request->getIsPost()) {

            $timeFrom = Yii::$app->request->post('time-from');
            $timeTo = Yii::$app->request->post('time-to');
            $timeRest = Yii::$app->request->post('time-rest');
            $priceAverage = Yii::$app->request->post('price-average');
            $priceWeekend = Yii::$app->request->post('price-weekend');

            if (!$timePriceArray)
                if ($timeFrom && $timeTo && $timeRest)
                    $timePriceArray = $questTime->generateTimeLine(strtotime($timeFrom), strtotime($timeTo), $timeRest, $priceAverage, $priceWeekend);

            if (Yii::$app->request->post('time-price')) {
                if (QuestTime::saveQuestTimes(Yii::$app->request->post('time-price'), $id)) {
                    Yii::$app->session->setFlash('success', "Расписание сеансов сохранено");
                    $timePriceArray = QuestTime::find()->where(['quest_id' => $id])->orderBy('id')->all();
                } else Yii::$app->session->setFlash('error', "Ну удалось сохранить расписание сеансов");
            }
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id]);
            return $this->render('update', [
                'model' => $model,
            ]);
        } else {
            return $this->render('update', [
                'model' => $model,
                //'timePriceArray' => QuestTime::findAll(['quest_id'=>$id])
                'timePriceArray' => $timePriceArray
            ]);
        }
    }

    /**
     * Deletes an existing Quest model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Quest model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Quest the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Quest::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
