<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model backend\models\Sejarah */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sejarah-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=
    $form->field($model, 'isi')->widget(CKEditor::className(), [
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
    ]]);
    ?>

    <?php //<?= $form->field($model, 'created_at')->textInput() ?>

    <?php // <?= $form->field($model, 'updated_at')->textInput() ?>

    <?php //<?= $form->field($model, 'created_by')->textInput() ?>

    <?php // <?= $form->field($model, 'updated_by')->textInput() ?>

    <?php // <?= $form->field($model, 'active')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
