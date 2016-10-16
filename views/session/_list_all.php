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

        <div class="news-item">
           <h2><?= Html::encode($model->header) ?>
            <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
           </h2>
            <?php

               $weeks=\app\models\Week::find()->where(['sub' => $model->id])->all();
                    $exercises=\app\models\Exercise::find()->where(['sub' => $model->id])->all();
            echo "<div class='sessions'>";
            $i=0;
                foreach ($weeks as $week){

                    print "<h4>$week->header ";
                    print Html::a('Редактировать', ['update', 'id' => $week->id], ['class' => 'btn btn-default btn-sm']);
                    print "</h4> ";
                    if (($week->audio1==0) and($week->audio2==0)){
                        print '<div align="center" style="background: red; color: white; width: 100px">Нет аудио</div>';
                    }else{
                        print '<div align="center" style="background: green; color: white; width: 100px">Есть аудио</div>';
                    }

                    print '<br>';
                }

                    echo "</div>";
            ?>
        </div>

    </div>
<?php
