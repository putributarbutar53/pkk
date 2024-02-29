<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Event */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Event', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="event-view">

    <p>
        <?= Html::a('Ubah', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'condensed' => true,
        'hover' => true,
        'mode' => DetailView::MODE_VIEW,
        'panel' => [
            'heading' => 'Detail Event ' . $model->nama,
            'type' => DetailView::TYPE_INFO,
        ],
        'buttons1' => '',
        'hAlign' => 'left',
        'vAlign' => 'top',

        'attributes' => [
    //            'id',
        'nama',
            [
                'attribute' => 'deskripsi',
                'format' => 'raw',
            ],
            [
                'attribute' => 'foto',
                'format' => 'raw',
                'value' => Html::img($model->foto, ['width' => 400])
            ],
            [
                'attribute' => 'file',
                'format' => 'raw',
                'value' => '<a href=' . $model->file . ' class="btn btn-md btn-primary" target="_blank"><i class="fa fa-download"></i></a>'
            ],
            'waktu_mulai',
            'waktu_selesai',
            //'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',
            //'active',
        ],
    ]) ?>

</div>
