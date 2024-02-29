<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\FileDownload */

$this->title = 'Ubah Pedoman dan Juknis: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pedoman dan Juknis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="file-download-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
