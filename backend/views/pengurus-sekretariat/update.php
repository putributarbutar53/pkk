<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PengurusSekretariat */

$this->title = 'Ubah Pengurus Sekretariat: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pengurus Sekretariat', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pengurus-sekretariat-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
