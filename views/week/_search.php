<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WeekSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="week-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'sub') ?>

    <?= $form->field($model, 'header') ?>

    <?= $form->field($model, 'datestart') ?>

    <?= $form->field($model, 'audio1') ?>

    <?php // echo $form->field($model, 'audio2') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
