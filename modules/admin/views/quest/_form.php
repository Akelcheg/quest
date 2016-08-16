<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Quest */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quest-form">

    <?php $form = ActiveForm::begin([
        //'options' => ['data' => ['pjax' => true]],
        // more ActiveForm options
    ]); ?>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'price_average')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'price_holiday')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'people')->textInput() ?>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>

<div class="quest-times-form">

    <h1>Quest Times span</h1>

    <?php Pjax::begin(); ?>
    <?= Html::beginForm(['quest/create'], 'post', ['data-pjax' => '', 'class' => '']); ?>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?= Html::label('Со скольки начинает работу разделить :', 'time-from') ?>
                <?= Html::input('text', 'time-from', Yii::$app->request->post('time-from'), ['class' => 'form-control']) ?>
            </div>
        </div>
        <div class="col-md-6"></div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?= Html::label('До скольки работает', 'time-to') ?>
                <?= Html::input('text', 'time-to', Yii::$app->request->post('time-to'), ['class' => 'form-control']) ?>
            </div>
        </div>
        <div class="col-md-6"></div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?= Html::label('Сколько промежуток между играми', 'time-rest') ?>
                <?= Html::input('text', 'time-rest', Yii::$app->request->post('time-rest'), ['class' => 'form-control']) ?>
            </div>
        </div>
        <div class="col-md-6"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?= Html::submitButton('Hash String', ['class' => 'btn btn-primary', 'name' => 'hash-button']) ?>
        </div>
    </div>
    <?= Html::endForm() ?>

    <h3><?php var_dump($stringHash) ?></h3>


    <?php Pjax::end(); ?>

</div>
