<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WeekSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Недели';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="week-index">

    <p>
        <?= Html::a('Добавить неделю', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => '_list'
    ]) ?>
</div>
