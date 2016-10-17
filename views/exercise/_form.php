<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Exercise */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="exercise-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sub')->dropDownList(ArrayHelper::map(\app\models\Week::find()->all(), 'id', 'header')) ?>

    <?= $form->field($model, 'header')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
