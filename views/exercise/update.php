<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Exercise */

$this->title = 'Update Exercise: ' . $model->id;
?>
<div class="exercise-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
