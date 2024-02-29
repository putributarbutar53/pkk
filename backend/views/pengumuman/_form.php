<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use mihaildev\ckeditor\CKEditor;
use kartik\file\FileInput;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model backend\models\Pengumuman */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pengumuman-form">

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
    <?=
    $form->field($model, 'thumbnail')->widget(FileInput::classname(), [
        'options' => ['accept' => '*']])->label('Thumbnail');
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
