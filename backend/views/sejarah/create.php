<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Sejarah */

$this->title = 'Tambah Sejarah';
$this->params['breadcrumbs'][] = ['label' => 'Sejarah', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sejarah-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
