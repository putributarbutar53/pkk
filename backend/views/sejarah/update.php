<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Sejarah */

$this->title = 'Ubah Sejarah: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sejarah', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="sejarah-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
