<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MasterStatus */

$this->title = 'Tambah Master Status';
$this->params['breadcrumbs'][] = ['label' => 'Master Status', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-status-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
