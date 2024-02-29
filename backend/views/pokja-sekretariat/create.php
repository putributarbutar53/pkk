<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PokjaSekretariat */

$this->title = 'Tambah Pokja Sekretariat';
$this->params['breadcrumbs'][] = ['label' => 'Pokja Sekretariat', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pokja-sekretariat-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
