<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PokjaSekretariat */

$this->title = 'Ubah Pokja Sekretariat: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pokja Sekretariat', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pokja-sekretariat-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
