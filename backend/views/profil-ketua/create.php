<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ProfilKetua */

$this->title = 'Tambah Profil Ketua';
$this->params['breadcrumbs'][] = ['label' => 'Profil Ketua', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profil-ketua-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
