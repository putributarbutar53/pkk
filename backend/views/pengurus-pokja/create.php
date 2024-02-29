<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PengurusPokja */

$this->title = 'Pengurus Pokja';
$this->params['breadcrumbs'][] = ['label' => 'Pengurus Pokja', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengurus-pokja-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
