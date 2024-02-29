<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\StrukturOrganisasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Struktur Organisasi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="struktur-organisasi-index">

    <p>
        <?php
        $struktur = backend\models\StrukturOrganisasi::find()->all();
        if ($struktur != null) {

        } else {
            echo Html::a('Tambah Struktur Organisasi', ['create'], ['class' => 'btn btn-success']);
        }
        ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',

                // [
                //     'attribute'=> 'isi', 
                //     'label' => 'Struktur Organisasi', 
                // ],
            [
                'attribute' => 'isi',
                'label' => 'Struktur Organisasi',
                'format' => 'raw',
                'headerOptions' => ['style' => 'width:95%'],
                'value' => function ($model) {
                    $url = $model->isi;
                    return Html::img($url, ['width' => 400]);
                }
            ],
        //      [
        //     'label' => 'Isi',
        //     'attribute' => 'isi',
        //     'format' => 'raw',
        //     'value' => function($model) {
        //         return '<center><a href=' . $model->isi . ' class="btn btn-md btn-primary" target="_blank"><i class="fa fa-download"></i></a></center>';
        //     },
        //     'headerOptions' => ['style' => 'width:10%'],
        // ],
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            //'updated_by',
            //'active',

 //           ['class' => 'yii\grid\ActionColumn'],
 [
    'class' => 'yii\grid\ActionColumn',
    'template' => '{update} {delete}',
    'buttons' => [
        // 'view' => function ($url, $model) {
        //     return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', Url::to(['/struktur-organisasi/view', 'id' => $model->id]), [
        //                 'class' => 'btn btn-info',
        //                 'title' => 'Lihat',
        //                 'data-toggle' => 'tooltip',
        //                 'data-method' => 'post',
        //     ]);
        // },
        'update' => function($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', Url::to(['/struktur-organisasi/update', 'id' => $model->id]), [
                        'class' => 'btn btn-success btn-md',
                'title' => 'Edit',
                        'data-toggle' => 'tooltip',
            ]);
            
        },
        'delete' => function ($url, $model) {
                return $model->active == 10 ? Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'class' => 'btn btn-danger',
                            'title' => 'Hapus',
                            'data-toggle' => 'tooltip',
                            'data-method' => 'post',
                            'data-confirm' => 'Apakah anda yakin ingin menghapus data ini?'
                        ]) : '';
        },
    ],
],
        ],
    ]); ?>


</div>
