<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use kartik\file\FileInput;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\ProdukHukum */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produk-hukum-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'isi')->widget(CKEditor::className(), [
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
    ]]);
    ?>

    <?=
    $form->field($model, 'file')->widget(FileInput::classname(), [
        'options' => ['accept' => '*']])->label('File');
    ?>

    <?=
    $form->field($model, 'id_master_status')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(\backend\models\MasterStatus::find()->all(), 'id', 'nama'),
        'options' => ['placeholder' => 'Pilih Status'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Status');
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
