<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\widgets\FileInput;
//use mihaildev\ckeditor\CKEditor;
use backend\models\MasterKategori;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model backend\models\Berita */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="berita-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'isi')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'full',
        'clientOptions' => [
            'filebrowserBrowseUrl' => Yii::getAlias('@web/plugin/kcfinder') . '/browse.php?opener=ckeditor&type=files',
            'filebrowserImageBrowseUrl' => Yii::getAlias('@web/plugin/kcfinder') . '/browse.php?opener=ckeditor&type=images',
            'filebrowserFlashBrowseUrl' => Yii::getAlias('@web/plugin/kcfinder') . '/browse.php?opener=ckeditor&type=flash',
            'filebrowserUploadUrl' => Yii::getAlias('@web/plugin/kcfinder') . '/upload.php?opener=ckeditor&type=files',
            'filebrowserImageUploadUrl' => Yii::getAlias('@web/plugin/kcfinder') . '/upload.php?opener=ckeditor&type=images',
            'filebrowserFlashUploadUrl' => Yii::getAlias('@web/plugin/kcfinder') . '/upload.php?opener=ckeditor&type=flash',
            'allowedContent' => true,
        ]
    ])
    ?>
    <?php
    $form->field($model, 'id_kategori')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(MasterKategori::find()->all(), 'id', 'nama'),
        'options' => ['placeholder' => 'Pilih Jenis'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Jenis Kategori');
?>

    <?= 
        $form->field($model, 'foto')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*']])->label('Foto');
?>

    <?= 
        $form->field($model, 'file')->widget(FileInput::classname(), [
        'options' => ['accept' => '*']])->label('File');
?>

    <!-- <?= $form->field($model, 'jumlah_view')->textInput(['maxlength' => true]) ?> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
