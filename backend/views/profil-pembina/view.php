<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ProfilPembina */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Profil Pembina', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="profil-pembina-view">


    <p>
        <?= Html::a('Ubah', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Hapus', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
            'attribute' => 'isi',
            'format' => 'raw',
        ],
            [
            'attribute' => 'foto',
            'format' => 'raw',
            'value' => Html::img($model->foto, ['width' => 400])
        ],
    ],
    ]) ?>

</div>
