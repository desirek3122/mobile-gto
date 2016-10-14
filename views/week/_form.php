<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Week */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="week-form">

    <?php $form = ActiveForm::begin(['options'=>['style'=>['width'=>'500px']]])?>

    <?= $form->field($model, 'sub')->dropDownList(ArrayHelper::map(\app\models\Session::find()->all(), 'id', 'header')) ?>

    <?= $form->field($model, 'header')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'datestart')->widget(DatePicker::className(),[
        'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>
    <?= $form->field($model, 'audioFile')->fileInput() ?>


<table class="table table-striped">
    <?php


    $lessons=\app\models\Lesson::find()->all();
    print '<tr>';
    print '<td>';
    print '</td>';
    foreach ($lessons as $lesson){
        print '<td><b>';
        print $lesson->header;
        print '</b>';
        print '</td>';
    }
    print '</tr>';

    $exercises=\app\models\Exercise::find()->all();
    $data= new \app\models\LessonData;
    foreach ($exercises as $exersice){
        print '<tr><b><td>';
        print $exersice->header;
        print '</td></b>';
        print '<td>';
        print '</td>';
        print '</tr>';
    }
    $form->field($data, 'data');




    ?>
</table>




    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
