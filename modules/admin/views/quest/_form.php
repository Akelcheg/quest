<?php

use app\components\Alert;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Quest */
/* @var $form yii\widgets\ActiveForm */
?>

<ul class="nav nav-tabs" role="tablist">
    <li class="active"><a data-toggle="pill" href="#quest-info">Информация о квесте</a></li>
    <?php if (!$model->isNewRecord) { ?>
        <li><a data-toggle="pill" href="#quest-timeline">Расписание сеансов</a></li>
    <?php } ?>
</ul>

<div class="tab-content">
    <div id="quest-info" class="tab-pane fade in active">
        <div class="quest-form">

            <?php $form = ActiveForm::begin([
                //'options' => ['data' => ['pjax' => true]],
                // more ActiveForm options
            ]); ?>

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($imageModel, 'imageFile')->fileInput() ?>
                </div>
            </div>

            <div class="row">

                <div class="col-md-3">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'people')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'is_open')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'description')->textInput() ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'passing_percentage')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'quest_holder')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>
                </div>
            </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>

    <?php if (!$model->isNewRecord) { ?>
        <div id="quest-timeline" class="tab-pane fade">
            <div class="quest-times-form">

                <h1>Quest Times span</h1>

                <?php Pjax::begin(['id' => 'countries']); ?>
                <?= Html::beginForm(['quest/update?id=' . $model->id], 'post', ['data-pjax' => 'true', 'class' => '']); ?>

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
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= Html::label('Цена за обычный день', 'price-average') ?>
                            <?= Html::input('text', 'price-average', Yii::$app->request->post('price-average'), ['class' => 'form-control']) ?>
                        </div>
                    </div>
                    <div class="col-md-6"></div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= Html::label('Цена за обычный день', 'price-weekend') ?>
                            <?= Html::input('text', 'price-weekend', Yii::$app->request->post('price-weekend'), ['class' => 'form-control']) ?>
                        </div>
                    </div>
                    <div class="col-md-6"></div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?= Html::submitButton('Создать расписание', ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>

                <?= Html::endForm() ?>

                <?= Html::beginForm(['quest/update?id=' . $model->id], 'post', ['data-pjax' => 'true']); ?>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Время</th>
                            <th>Цена</th>
                            <th>Цена(выходной)</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php if ($timePriceArray) { ?>
                            <?php foreach ($timePriceArray as $key => $timePrice): ?>
                                <tr>
                                    <td>
                                        <?= Html::input('text', "time-price[$key][time_value]",
                                            $timePrice['time_value']
                                            , ['class' => 'form-control']) ?>
                                    </td>
                                    <td>
                                        <?= Html::input('text', "time-price[$key][price]",
                                            $timePrice['price']
                                            , ['class' => 'form-control']) ?>
                                    </td>
                                    <td>
                                        <?= Html::input('text', "time-price[$key][weekend_price]",
                                            $timePrice['weekend_price']
                                            , ['class' => 'form-control']) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php } ?>

                        <?php if (Yii::$app->request->post('time-price') && !$timePrice) { ?>
                            <?php foreach (Yii::$app->request->post('time-price') as $key => $timePrice): ?>
                                <tr>
                                    <td>
                                        <?= Html::input('text', "time-price[$key][time_value]",
                                            $timePrice['time_value']
                                            , ['class' => 'form-control']) ?>
                                    </td>
                                    <td>
                                        <?= Html::input('text', "time-price[$key][price]",
                                            $timePrice['price']
                                            , ['class' => 'form-control']) ?>
                                    </td>
                                    <td>
                                        <?= Html::input('text', "time-price[$key][weekend_price]",
                                            $timePrice['weekend_price']
                                            , ['class' => 'form-control']) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <?= Alert::widget() ?>
                    </div>
                </div>

                <?= Html::submitButton('Сохранить расписание', ['class' => 'btn btn-primary']) ?>
                <?= Html::endForm() ?>
                <?php Pjax::end(); ?>


            </div>
        </div>
    <?php } ?>

</div>
