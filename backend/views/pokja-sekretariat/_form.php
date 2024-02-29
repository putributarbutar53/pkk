<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\JenisPokja;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use mihaildev\ckeditor\CKEditor;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model backend\models\PokjaSekretariat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pokja-sekretariat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=
    $form->field($model, 'id_jenis_pokja')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(JenisPokja::find()->all(), 'id', 'nama'),
        'options' => ['placeholder' => 'Pilih Jenis Pokja'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Jenis Pokja');
    ?>

    <?=
    $form->field($model, 'program_kerja')->widget(CKEditor::className(), [
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
    ]])->label('Program Kerja');
    ?>

    <?=
    $form->field($model, 'papan_data')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
    ])->label('Data');
?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
