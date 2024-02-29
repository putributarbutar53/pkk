<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Prestasi */

$this->title = 'Ubah Prestasi: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Prestasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="prestasi-update">

    <?=
    $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
