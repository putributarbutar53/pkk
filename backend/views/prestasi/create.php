<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Prestasi */

$this->title = 'Tambah Prestasi';
$this->params['breadcrumbs'][] = ['label' => 'Prestasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prestasi-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
