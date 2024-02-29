<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ProdukHukum */

$this->title = 'Tambah Produk Hukum';
$this->params['breadcrumbs'][] = ['label' => 'Produk Hukums', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produk-hukum-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
