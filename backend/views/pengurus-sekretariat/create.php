<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PengurusSekretariat */

$this->title = 'Tambah Pengurus Sekretariat';
$this->params['breadcrumbs'][] = ['label' => 'Pengurus Sekretariat', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengurus-sekretariat-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
