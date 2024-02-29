<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\JenisPokja;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model backend\models\PengurusPokja */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pengurus-pokja-form">

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

    <?= $form->field($model, 'ketua')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wakil_ketua')->textInput(['maxlength' => true]) ?>
    <div class="padding-v-md">
        <div class="line line-dashed"></div>
    </div>

    <?php
    DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper',
        'widgetBody' => '.container-items',
        'widgetItem' => '.house-item',
        'limit' => 10000,
        'min' => 1,
        'insertButton' => '.add-house',
        'deleteButton' => '.remove-house',
        'model' => $modelKegiatan[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'description',
        ],
    ]);
    ?>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th style="width: 24%;">Anggota</th>
                <th style="width: 70%;"></th>
                <th class="text-center" style="width: 90px;">
                    <button type="button" class="add-house btn btn-success btn-xs"><span class="fa fa-plus"></span></button>
                </th>
            </tr>
        </thead>
        <tbody class="container-items">
            <?php foreach ($modelKegiatan as $indexKegiatan => $modelKegiatans): ?>
                <tr class="house-item">
                    <td class="vcenter">
                        <?php
                        // necessary for update action.
                        if (!$modelKegiatans->isNewRecord) {
                            echo Html::activeHiddenInput($modelKegiatans, "[{$indexKegiatan}]id");
                        }
                        ?>
                        </td>
                        <td>
                            <?= $form->field($modelKegiatans, "[{$indexKegiatan}]nama")->label(true)->textInput(['maxlength' => true]) ?>
                        </td>
                    <td class="text-center vcenter" style="width: 90px; verti">
                        <button type="button" class="remove-house btn btn-danger btn-xs"><span class="fa fa-minus"></span></button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php DynamicFormWidget::end(); ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
