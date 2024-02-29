<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\GaleriVideo */

$this->title = 'Ubah Video: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Galeri Video', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="galeri-video-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
