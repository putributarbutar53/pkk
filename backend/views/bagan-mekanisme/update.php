<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BaganMekanisme */

$this->title = 'Ubah Bagan Mekanisme: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bagan Mekanisme', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bagan-mekanisme-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
