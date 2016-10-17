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
            <?php
            $weeks=\app\models\Week::find()->where(['sub' => $model->id])->all();

            echo "<table class='table table-striped' >";

            print '<tr>';
            print '<td>';
            print '<b>';
            print Html::encode($model->header);
            print '</b>';
            print '</td>';
            print '<td>';
            print Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-default btn-sm']);
            print '</td>';
            print '<td>';
            print Html::a('Добавить неделю', ['week/create'], ['class' => 'btn btn-default btn-sm']);
            print '</td>';
            foreach ($weeks as $weektr) {
                $lessons=\app\models\Lesson::find()->where(['sub' => $weektr->id])->all();
                $counttr=count($lessons);
                for ($j=0;$j<=$counttr;$j++){
                    print '<td>';
                    print '</td>';
                }
            }


            print '</tr>';
                foreach ($weeks as $week){
                    print '<tr>';
                    print '<td>';
                    print "$week->header ";
                    print '</td>';
                    print '<td>';
                    print Html::a('Редактировать', ['week/update', 'id' => $week->id], ['class' => 'btn btn-default btn-sm']);
                    print '</td>';
                    print '<td>';
                    $exec=count($exercises=\app\models\Exercise::find()->where(['sub' => $week->id])->all());
                    if ($exec==0){
                        print '<div align="center" style="background: red; color: white; width: 120px">Нет упражнений';
                    }else{
                        print '<div align="center" style="background: green; color: white; width: 120px">'.$exec . ' упр.';
                    }
                    print '</td>';
                    print '<td>';
                    if (($week->audio1==0) and($week->audio2==0)){
                        print '<div align="center" style="background: red; color: white; width: 100px">Нет аудио</div>';
                    }else{
                        print '<div align="center" style="background: green; color: white; width: 100px">Есть аудио</div>';
                    }
                    print '</td>';
                    $lessons=\app\models\Lesson::find()->where(['sub' => $week->id])->all();
                    $count=count($lessons);
                    for ($i=0;$i<$count;$i++) {
                        if ($lessons[$i]['sub'] == $week->id) {
                            print '<td>';
                            if ($lessons[$i]['active']==0) {
                                print Html::a($lessons[$i]['header'], ['lesson/activate', 'id' => $lessons[$i]['id']], [
                                    'class' => 'btn btn-success',
                                ]);
                            }else{
                                print Html::a($lessons[$i]['header'], ['lesson/deactivate', 'id' => $lessons[$i]['id']], [
                                    'class' => 'btn btn-warning',
                                ]);
                            }
                            print '</td>';
                        }
                    }
                    print '<td>';
                    print Html::a('Удалить', ['week/delete', 'id' => $week->id], [
                        'data' => [
                            'confirm' => 'Вы действительно хотите удалить эту неделю?',
                            'method' => 'post',
                        ],
                    ]) ;
                    print '</td>';

                    print '</tr>';
                    print '<br>';
                }





                    echo "</table>";

            ?>

        </div>

    </div>
<?php
