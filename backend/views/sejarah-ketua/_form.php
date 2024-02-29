<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model backend\models\SejarahKetua */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sejarah-ketua-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pembina')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ketua')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'mulai')->widget(DatePicker::classname(), [
        'options' => ['value' => date('Y')],
        'removeButton' => false,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy', //yyyy choose to year, yyyy-mm to month, yyyy-mm-dd to day
            'startView' => 2, //The actual range (0: day 1: day 2: year)
            'maxViewMode' => 2, //Maximum selection range (years)
            'minViewMode' => 2, //Minimum selection range (years)
        ]
    ])
    ?>
    <?=
    $form->field($model, 'selesai')->widget(DatePicker::classname(), [
        'options' => ['value' => date('Y')],
        'removeButton' => false,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy', //yyyy choose to year, yyyy-mm to month, yyyy-mm-dd to day
            'startView' => 2, //The actual range (0: day 1: day 2: year)
            'maxViewMode' => 2, //Maximum selection range (years)
            'minViewMode' => 2, //Minimum selection range (years)
        ]
    ])
    ?>

    <?=
    $form->field($model, 'foto')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*']])->label('Foto');
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
