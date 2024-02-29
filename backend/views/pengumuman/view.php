<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Pengumuman */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Pengumumen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pengumuman-view">


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


    <?=
    DetailView::widget([
        'model' => $model,
        'condensed' => true,
        'hover' => true,
        'mode' => DetailView::MODE_VIEW,
        'panel' => [
            'heading' => 'Detail Produk Hukum ' . $model->judul,
            'type' => DetailView::TYPE_INFO,
        ],
        'buttons1' => '',
        'hAlign' => 'left',
        'vAlign' => 'top',
        'attributes' => [
                [
                'attribute' => 'judul',
                'label' => 'Judul',
                'value' => $model->judul
            ],
                [
                'attribute' => 'isi',
                'format' => 'raw',
            ],
                [
                'attribute' => 'thumbnail',
            'format' => 'raw',
                'value' => Html::img($model->thumbnail, ['width' => 400])
        ],
                [
                'attribute' => 'id_master_status',
                'label' => 'Status',
                'format' => 'raw',
                'value' => $model->masterStatus->nama
            ],
        ],
    ])
    ?>

</div>
