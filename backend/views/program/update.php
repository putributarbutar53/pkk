<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Program */

$this->title = 'Ubah Program: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Programs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="program-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
