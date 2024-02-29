<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Visi */

$this->title = 'Ubah Visi: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Visis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="visi-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
