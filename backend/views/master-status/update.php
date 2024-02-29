<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MasterStatus */

$this->title = 'Update Master Status: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Master Status', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="master-status-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
