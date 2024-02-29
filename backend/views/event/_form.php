<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use mihaildev\ckeditor\CKEditor;
use kartik\widgets\FileInput;
use kartik\date\DatePicker;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model backend\models\Event */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'deskripsi')->widget(CKEditor::className(), [
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
        $form->field($model, 'foto')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*']])->label('Foto');
?>

    <?= 
        $form->field($model, 'file')->widget(FileInput::classname(), [
            'options' => ['accept' => '*']])->label('File');
?>

    <?=
        $form->field($model, 'waktu_mulai')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Waktu Mulai'],
            'pluginOptions' => [
            'autoclose' => true,
            'todayHighlight' => true,
            'format' => 'yyyy-mm-dd'
            ]
        ]);
    ?>

<?=
        $form->field($model, 'waktu_selesai')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Waktu Selesai'],
            'pluginOptions' => [
            'autoclose' => true,
            'todayHighlight' => true,
            'format' => 'yyyy-mm-dd'
            ]
        ]);
    ?>
    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
