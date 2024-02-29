<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\FileDownload */

$this->title = 'Tambah Pedoman dan Juknis';
$this->params['breadcrumbs'][] = ['label' => 'Pedoman dan Juknis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="file-download-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
