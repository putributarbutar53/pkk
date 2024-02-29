<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ProfilPembina */

$this->title = 'Ubah Profil Pembina: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Profil Pembina', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="profil-pembina-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
