<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\GaleriFoto */

$this->title = 'Tambah Foto';
$this->params['breadcrumbs'][] = ['label' => 'Galeri Foto', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="galeri-foto-create">


    <?= $this->render('_form', [
        'model' => $model,
        'modelChild' => $modelChild
    ]) ?>

</div>
