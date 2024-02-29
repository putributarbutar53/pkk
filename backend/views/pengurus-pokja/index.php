<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\JenisPokja;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\PengurusPokjaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pengurus Pokja';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengurus-pokja-index">

    <p>
        <?= Html::a('Tambah Pengurus Pokja', ['create-new'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

    //            'id',
        [
            'label' => 'Jenis Pokja',
            'headerOptions' => ['style' => 'width:30%'],
            'value' => function($model) {
                $findJenis = JenisPokja::findOne($model->id_jenis_pokja);
                return $findJenis->nama;
            }
        ],
        [
            'attribute' => 'ketua',
            'label' => 'Ketua',
            'headerOptions' => ['style' => 'width:30%'],
            
        ],
        [
            'attribute' => 'wakil_ketua',
            'label' => 'Ketua',
            'headerOptions' => ['style' => 'width:30%'],
        ],
//        'ketua',
//            'wakil_ketua',
//            'created_at',
        //'updated_at',
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
//                'update' => function($url, $model) {
//                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', Url::to(['/pengurus-pokja/update', 'id' => $model->id]), [
//                        'class' => 'btn btn-success btn-md',
//                        'title' => 'Edit',
//                        'data-toggle' => 'tooltip',
//                    ]);
//                },
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
