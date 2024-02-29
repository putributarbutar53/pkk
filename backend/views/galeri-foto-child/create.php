<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\GaleriFotoChild */

$this->title = 'Create Galeri Foto Child';
$this->params['breadcrumbs'][] = ['label' => 'Galeri Foto Children', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="galeri-foto-child-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
