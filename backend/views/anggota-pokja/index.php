<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\PengurusPokja;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\AnggotaPokjaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Anggota Pokja';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anggota-pokja-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

    //            'id',
        [
            'label' => 'Pengurus Pokja',
            'headerOptions' => ['style' => 'width:30%'],
            'value' => function($model) {
                $findPengurus = PengurusPokja::findOne($model->id_pengurus_pokja);
                return $findPengurus->jenisPokja->nama;
            }
        ],
        [
            'attribute' => 'nama',
            'label' => 'Nama',
            'headerOptions' => ['style' => 'width:70%'],
        ],
        //            'created_at',
//            'updated_at',
        //'created_by',
            //'updated_by',
            //'active',
            [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{delete}',
            'buttons' => [
                // 'view' => function ($url, $model) {
                //     return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', Url::to(['/struktur-organisasi/view', 'id' => $model->id]), [
                //                 'class' => 'btn btn-info',
                //                 'title' => 'Lihat',
                //                 'data-toggle' => 'tooltip',
                //                 'data-method' => 'post',
                //     ]);
                // },
                
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
