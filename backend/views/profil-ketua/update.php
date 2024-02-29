<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ProfilKetua */

$this->title = 'Ubah Profil Ketua: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Profil Ketua', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="profil-ketua-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
