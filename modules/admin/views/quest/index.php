<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\QuestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quest-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--<p>
        <? /*= Html::a('Create Quest', ['create'], ['class' => 'btn btn-success']) */ ?>
    </p>-->
    <?= GridView::widget([
        'summary' => '',
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                //'label' => 'Size',
                'attribute' => 'name',
                'format' => 'html',
                'value' => function ($model) {
                    return '<a href="quest/update?id=' . $model->id . '">' . $model->name . '</a>';
                },
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
