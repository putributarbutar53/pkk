<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\GaleriVideo */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Galeri Video', 'url' => ['index']];

\yii\web\YiiAsset::register($this);
?>
<div class="galeri-video-view">

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
            'heading' => 'Detail Video ' . $model->nama,
            'type' => DetailView::TYPE_INFO,
        ],
        'buttons1' => '',
        'hAlign' => 'left',
        'vAlign' => 'top',
        'attributes' => [
    //            'id',
        [
                'attribute' => 'nama',
                'format' => 'raw',
            ],
            'url:url',
            [
                'attribute' => 'foto_thumbnail',
                'format' => 'raw',
                'value' => Html::img($model->foto_thumbnail, ['width' => 400])
            ],
    
        ],
    ]) ?>

</div>
