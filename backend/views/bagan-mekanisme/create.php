<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BaganMekanisme */

$this->title = 'Tambah Bagan Mekanisme';
$this->params['breadcrumbs'][] = ['label' => 'Bagan Mekanisme', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bagan-mekanisme-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
