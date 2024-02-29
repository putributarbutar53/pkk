<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PengurusSekretariat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pengurus-sekretariat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ketua')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ketua_1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sekretaris')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bendahara')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
