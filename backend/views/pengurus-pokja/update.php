<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PengurusPokja */

$this->title = 'Ubah Pengurus Pokja: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pengurus Pokja', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pengurus-pokja-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
