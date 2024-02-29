<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AnggotaPokja */

$this->title = 'Tambah Anggota Pokja';
$this->params['breadcrumbs'][] = ['label' => 'Anggota Pokja', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anggota-pokja-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
