<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Pengumuman */

$this->title = 'Ubah Pengumuman: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pengumuman', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pengumuman-update">

    <?=
    $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
