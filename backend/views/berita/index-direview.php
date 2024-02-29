<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\BeritaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Berita Direview';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="berita-index">

    <p>
        <?php Html::a('Tambah Berita', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'id_kategori',
            [
                'attribute' => 'judul',
                'label' => 'Judul',
                'value' => function($model) {
                    return $model->judul;
                },
                'headerOptions' => ['style' => 'width:85%'],
            ],
            // 'isi:ntext',
            [
                'label' => 'Foto ',
                'attribute' => 'foto',
                'format' => 'raw',
                'value' => function($model) {
                if ($model->foto != null) {
                    return '<a href=' . $model->foto . ' class="btn btn-sm btn-primary" target="_blank"><i class="fa fa-download"></i></a>';
                } else {
                    return '-';
                }
            },
                'headerOptions' => ['style' => 'width:5%'],
            ],
            [
                'label' => 'File ',
                'attribute' => 'file',
                'format' => 'raw',
                'value' => function($model) {
                if ($model->file != null) {
                    return '<a href=' . $model->file . ' class="btn btn-sm btn-primary" target="_blank"><i class="fa fa-download"></i></a>';
                } else {
                    return '-';
                }
            },
                'headerOptions' => ['style' => 'width:5%'],
            ],
            [
            'attribute' => 'id_master_status',
            'format' => 'raw',
            'label' => 'Status',
            'value' => function($model) {
                return $model->masterStatus->nama;
            }
        ],
        // 'jumlah_view',
                // 'value' => function($model) {
                //     return $model->jumlah_view;
                // },
                // 'headerOptions' => ['style' => 'width:5%'],

            //'file',
            //'jumlah_view',
            //'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',
            //'active',

            [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view}',
            'buttons' => [
                'view' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', Url::to(['/berita/view-review', 'id' => $model->id]), [
                                'class' => 'btn btn-info',
                                'title' => 'Lihat',
                                'data-toggle' => 'tooltip',
                                'data-method' => 'post',
                    ]);
                },
//                    'update' => function($url, $model) {
//                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', Url::to(['/bagan-mekanisme/update', 'id' => $model->id]), [
//                            'class' => 'btn btn-success btn-md',
//                            'title' => 'Edit',
//                            'data-toggle' => 'tooltip',
//                        ]);
//                    },
//                    'delete' => function ($url, $model) {
//                        return $model->active == 10 ? Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
//                            'class' => 'btn btn-danger',
//                            'title' => 'Hapus',
//                            'data-toggle' => 'tooltip',
//                            'data-method' => 'post',
//                            'data-confirm' => 'Apakah anda yakin ingin menghapus data ini?'
//                        ]) : '';
//                    },
            ],
        ],
    ],
    ]); ?>


</div>
