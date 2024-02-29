<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\GaleriFoto */

$this->title = 'Ubah Galeri Foto: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Galeri Foto', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="galeri-foto-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
