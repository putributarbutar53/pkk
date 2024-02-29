<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ProgramSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Program';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="program-index">

    <p>
        <?php
        $program = backend\models\Program::find()->all();
        if ($program != null) {
            
        } else {
            echo Html::a('Tambah Program', ['create'], ['class' => 'btn btn-success']);
        }
        ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

    //            'id',
        [
            'attribute' => 'isi',
            'label' => 'Program',
            'format' => 'raw',
            'headerOptions' => ['style' => 'width:95%'],
        ],
//            'created_at',
//            'updated_at',
//            'created_by',
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
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', Url::to(['/program/update', 'id' => $model->id]), [
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
