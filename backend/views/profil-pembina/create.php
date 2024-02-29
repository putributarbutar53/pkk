<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ProfilPembina */

$this->title = 'Tambah Profil Pembina';
$this->params['breadcrumbs'][] = ['label' => 'Profil Pembina', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profil-pembina-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
