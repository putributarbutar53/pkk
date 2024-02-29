<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
/* @var $this yii\web\View */
/* @var $model backend\models\StrukturOrganisasi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="struktur-organisasi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= 
        $form->field($model, 'isi')->widget(FileInput::classname(), [
        'options' => ['accept' => '*']])->label('Foto');
?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
