<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AnggotaPokja */

$this->title = 'Ubah Anggota Pokja: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Anggota Pokja', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="anggota-pokja-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
