<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\HtmlPurifier;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Session */
/* @var $form yii\widgets\ActiveForm */
?>

    <div class="session-form">
        <table class='table table-striped' >
        <div class="news-item">
            <?php
            $weeks=\app\models\User::find()->where(['sub' => $model->id])->all();


            print '<tr>';
            print '<td>';
            print Html::encode($model->surname);
            print '</td>';
            print '<td>';
            print Html::encode($model->name);
            print '</td>';
            print '<td>';
            print Html::encode($model->patronymic);
            print '</td>';
            print '<td>';
            print Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-default btn-sm']);
            print '</td>';
            print '</tr>';

            ?>

        </div>
        </table>

    </div>
<?php
