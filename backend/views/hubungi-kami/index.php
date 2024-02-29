<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\HubungiKamiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hubungi Kami';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hubungi-kami-index">


    <!-- <p>
    <?= Html::a('Tambah Hubungi Kami', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'nama',
            'email:email',
            'no_hp',
            'pesan:ntext',
            //'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',
            //'active',

         //   ['class' => 'yii\grid\ActionColumn'],
         [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {delete}',
            'buttons' => [
                'view' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', Url::to(['/hubungi-kami/view', 'id' => $model->id]), [
                                'class' => 'btn btn-info',
                                'title' => 'View Detail',
                                'data-toggle' => 'tooltip',
                                'data-method' => 'post',
                    ]);
                },
                // 'update' => function ($url, $model) {
                //     return Html::a('<span class="glyphicon glyphicon-pencil"></span>', Url::to(['/hubungi-kami/update', 'id' => $model->id]), [
                //                 'class' => 'btn btn-success btn-md',
                //                 'title' => 'Edit Hubungi Kami',
                //                 'data-toggle' => 'tooltip',
                //                 'data-method' => 'post',
                //     ]);
                // },
                'delete' => function ($url, $model) {
                   return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                'class' => 'btn btn-danger',
                                'title' => 'Hapus',
                                'data-toggle' => 'tooltip',
                                'data-method' => 'post',
                                'data-confirm' => 'Apakah anda yakin ingin menghapus data ini?'
                   ]); 
                },
               
            ],
        ],
        ],
    ]); ?>


</div>
