<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\HtmlPurifier;

/* @var $this yii\web\View */
/* @var $model app\models\Session */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="session-form">
    <table class='table table-striped' >
        <div class="news-item">
            <?php
            $users=\app\models\User::find()->where(['sub' => $model->id])->all();
            print '<tr>';
            print '<td>';
            print '<b>';
            print Html::encode($model->header);
            print '</b>';
            print '</td>';
            print '<td>';
            print Html::a('Редактировать', ['group/update', 'id' => $model->id], ['class' => 'btn btn-default btn-sm']);
            print '</tr>';
            foreach ($users as $user){
                if ($user->admin == 1){
                    continue;
                }else{
                    print '<td>';
                    print Html::encode($user->surname);
                    print '</td>';
                    print '<td>';
                    print Html::encode($user->name);
                    print '</td>';
                    print '<td>';
                    print Html::encode($user->patronymic);
                    print '</td>';
                    print '<td>';
                    print Html::a('Редактировать', ['user/update', 'id' => $user->id], ['class' => 'btn btn-default btn-sm']);
                    print '</td>';
                    print '<td>';
                    print Html::a('Отправить пароль', ['user/sendpassword', 'id' => $user->id], ['class' => 'btn btn-danger btn-sm']);
                    print '</td>';
                    print '<td>';
                    print '<b>';
                    if ($user->status==2){
                        print '<div align="center" style="background: #E56233; color: white; width: 100px">';
                        print Html::a('Активен', ['#']);
                        print '</div>';
                    }else{
                        print '<div align="center" style="background: #43D14D; color: white; width: 100px">';
                        print Html::a('Активировать', ['user/activate', 'id' => $user->id]);
                        print '</div>';
                    }
                    print '</b>';
                    print '</td>';
                    print '</tr>';
                }
            }

            ?>

        </div>
    </table>

</div>


    </div>
