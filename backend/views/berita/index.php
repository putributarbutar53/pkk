<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\BeritaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Berita';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="berita-index">
    <p>
        <?= Html::a('Tambah Berita', ['create'], ['class' => 'btn btn-success']) ?>
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
            'attribute' => 'id_penulis',
            'label' => 'Penulis',
            'value' => function ($model) {
                $user = common\models\User::findOne($model->id_penulis);
                return $user->username;
            },
            'headerOptions' => ['style' => 'width:10%'],
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
