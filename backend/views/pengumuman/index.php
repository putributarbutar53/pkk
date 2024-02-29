<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\PengumumanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pengumuman';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengumuman-index">

    <p>
        <?= Html::a('Tambah Pengumuman', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
            'attribute' => 'judul',
            'format' => 'raw',
            'label' => 'Judul',
            'value' => function($model) {
                return $model->judul;
            },
            'headerOptions' => ['style' => 'width:85%'],
        ],
            
            [
            'attribute' => 'thumbnail',
            'format' => 'raw',
            'label' => 'Thumbnail',
            'value' => function($model) {
                return '<a href=' . $model->thumbnail . ' class="btn btn-sm btn-primary" target="_blank"><i class="fa fa-download"></i></a>';
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
        //'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',
            //'active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
