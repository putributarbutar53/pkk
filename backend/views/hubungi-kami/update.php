<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\HubungiKami */

$this->title = 'Ubah Hubungi Kami: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hubungi Kamis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="hubungi-kami-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
