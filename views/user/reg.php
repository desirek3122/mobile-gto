<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\RegForm */
/* @var $form ActiveForm */
?>
<div class="main-reg">

    <?php $form = ActiveForm::begin(['options'=>['style'=>['width'=>'500px']]]); ?>
    <?=$form->field($model, 'sub')->dropDownList(ArrayHelper::map(\app\models\Group::find()->all(), 'id', 'header')) ?>
    <?= $form->field($model, 'surname')->textInput()  ?>
    <?= $form->field($model, 'name')->textInput()  ?>
    <?= $form->field($model, 'patronymic')->textInput() ?>
    <?= $form->field($model, 'phone')->textInput()  ?>
    <?= $form->field($model, 'status')->textInput()  ?>
    <?= $form->field($model, 'admin')->textInput() ?>
    <?= $form->field($model, 'email')->input('email')  ?>
    <?= $form->field($model, 'password')->passwordInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>


</div><!-- main-reg -->