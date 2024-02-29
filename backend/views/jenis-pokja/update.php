<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\JenisPokja */

$this->title = 'Ubah Jenis Pokja: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Jenis Pokja', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jenis-pokja-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
