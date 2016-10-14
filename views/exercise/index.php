<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ExerciseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Exercises';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exercise-index">


    <p>
        <?= Html::a('Создать упражнение', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => '_list'
    ]) ?>
</div>
