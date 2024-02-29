<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model backend\models\GaleriVideo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="galeri-video-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

     <?= 
        $form->field($model, 'foto_thumbnail')->widget(FileInput::classname(), [
        'options' => ['accept' => '*']])->label('Foto Thumbnail');
?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
