<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\GaleriVideo */

$this->title = 'Tambah Video';
$this->params['breadcrumbs'][] = ['label' => 'Galeri Video', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="galeri-video-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
