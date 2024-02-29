<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Visi;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\VisiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Visi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visi-index">


    <p>
        <?php
        $visi = Visi::find()->all();
        if ($visi != null) {
            
        } else {
            echo Html::a('Tambah Visi', ['create'], ['class' => 'btn btn-success']);
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
            [
            'attribute' => 'isi',
            'label' => 'Visi',
            'format' => 'raw',
            'headerOptions' => ['style' => 'width:95%'],
        ],
        //'updated_by',
            //'active',

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
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', Url::to(['/visi/update', 'id' => $model->id]), [
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
