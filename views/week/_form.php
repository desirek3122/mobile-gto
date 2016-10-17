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

    <?php $form = ActiveForm::begin()?>

    <?= $form->field($model, 'header')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sub')->dropDownList(ArrayHelper::map(\app\models\Session::find()->all(), 'id', 'header')) ?>

    <?= $form->field($model, 'datestart')->widget(DatePicker::className(),[
        'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<table class="table table-striped">
    <audio src="/uploads/audio1/iamagod.mp3" preload="auto"></audio>
    <?php

    $data=\app\models\LessonData::className();
    $lessons=\app\models\Lesson::find()->all();
    $count=0;
    print '<tr>';
    print '<td>';
    print '</td>';

    foreach ($lessons as $lesson){
        if ($lesson->sub===$model->id) {
            print '<td align="center"><b>';
            print $lesson->header;
            print '</b>';
            print '</td>';
            $count++;
        }
    }
    print '<td>';
    print '</td>';
    print '<td>';
    print '</td>';
    print '</tr>';


    $exercises=\app\models\Exercise::find()->all();
    $data= new \app\models\LessonData;
    foreach ($exercises as $exersice){
        if ($exersice->sub===$model->id) {
            print '<tr><b><td>';
            print $exersice->header;
            print '</td></b>';
            $ex=$exersice->id;
            for ($i=0;$i<$count;$i++) {
                print '<td>';
                print $form->field($data, 'data')->textInput()->label(false);
                print $form->field($data, 'exercise_id')->hiddenInput(['value' => $ex])->label(false);
                print '</td>';
            }
            print '<td>';
            print Html::a('Редактировать', ['exercise/update', 'id' => $exersice->id], ['class' => 'btn btn-default btn-sm']);
            print '</td>';
            print '<td>';
            print Html::a('Удалить', ['exercise/delete', 'id' => $exersice->id], [
                'data' => [
                    'confirm' => 'Вы действительно хотите удалить это упражнение?',
                    'method' => 'post',
                ],
                'class' => ['btn btn-default btn-sm']

            ]) ;
            print '</td>';
            print '</tr>';
        }
    }
    print Html::a('Добавить упражнение', ['exercise/create'], ['class' => 'btn btn-default btn-sm']);


    ?>

</table>
</div>

<div class="form-group" align="center">
        <?= Html::a('Сохранить',['lesson/add'], ['class' => 'btn btn-primary']) ?>
    </div>
<div>
    <?php
    print '<h2>Уроки</h2>';
    $lessons=\app\models\Lesson::find()->where(['sub' => $model->id])->all();
    foreach ($lessons as $lesson){
        print '<b>';
        print $lesson->header ;
        print '(' . substr($lesson->datestart, 0, -9) . ')   ';

        print Html::a('Редактировать    ', ['lesson/update', 'id' => $lesson->id], ['class' => 'btn btn-default btn-sm']);
        print Html::a('Удалить', ['lesson/delete', 'id' => $lesson->id],  [
            'data' => [
                'confirm' => 'Вы действительно хотите удалить этот урок?',
                'method' => 'post',
            ],
            'class' => ['btn btn-default btn-sm'],
        ]);
        print '</b>';
        print '<br>';
        print $form->field($data, 'lesson_id')->hiddenInput(['value' => $lesson->id])->label(false);
    }
    print Html::a('Добавить урок    ', ['lesson/create'], ['class' => 'btn btn-primary']);
    ?>
</div>







    <?php ActiveForm::end(); ?>


<audio src="/uploads/audio1/shark.mp3" preload="auto" controls autoplay></audio>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="/vendor/audiojs/audioplayer.js"></script>
<script>
    $( function()
    {
        $( 'audio' ).audioPlayer();
    });
</script>


