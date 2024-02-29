<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\JenisPokja */

$this->title = 'Tambah Jenis Pokja';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Pokja', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-pokja-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
