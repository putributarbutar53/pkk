<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MasterKategori */

$this->title = 'Ubah Master Kategori: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Master Kategori', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="master-kategori-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
