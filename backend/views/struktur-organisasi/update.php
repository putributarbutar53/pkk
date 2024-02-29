<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\StrukturOrganisasi */

$this->title = 'Ubah Struktur Organisasi: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Struktur Organisasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="struktur-organisasi-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
