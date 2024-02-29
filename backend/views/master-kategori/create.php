<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MasterKategori */

$this->title = 'Tambah Master Kategori';
$this->params['breadcrumbs'][] = ['label' => 'Master Kategori', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-kategori-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
