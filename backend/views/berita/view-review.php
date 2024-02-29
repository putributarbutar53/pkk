<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Berita */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Berita', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="berita-view">


    <?= DetailView::widget([
        'model' => $model,
        'condensed' => true,
        'hover' => true,
        'mode' => DetailView::MODE_VIEW,
        'panel' => [
            'heading' => 'Detail Berita ' . $model->judul,
            'type' => DetailView::TYPE_INFO,
        ],
        'buttons1' => '',
        'hAlign' => 'left',
        'vAlign' => 'top',

        'attributes' => [
            [
                'attribute' => 'id_kategori',
                'label' => 'Kategori',
                'value' => $model->kategori->nama
        ],
            'judul',
                [
                'attribute' => 'isi',
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
            'jumlah_view',
        ],
    ]) ?>

</div>
