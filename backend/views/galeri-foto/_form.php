<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\Url;
use mihaildev\ckeditor\CKEditor;
use backend\models\GaleriFotoChild;

/* @var $this yii\web\View */
/* @var $model backend\models\GaleriFoto */
/* @var $form yii\widgets\ActiveForm */

$modelChild = new GaleriFotoChild();


?>

<div class="galeri-foto-form">

    <?php $form = ActiveForm::begin(['action' => ['galeri-foto/create'], 'options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true])->label('Judul') ?>

    <?=
    $form->field($model, 'deskripsi')->widget(CKEditor::className(), [
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
    ]]);
    ?>

    <?=
    $form->field($model, 'foto_thumbnail')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
    ]);
    ?>

    <?=
    $form->field($modelChild, 'foto')->widget(FileInput::classname(), [
        'options' => ['multiple' => true, 'accept' => 'image/*'],
        'pluginOptions' => ['previewFileType' => 'image']
    ])->label('Foto Galeri');
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
