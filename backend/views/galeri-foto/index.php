<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\GaleriFotoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Galeri Foto';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="galeri-foto-index">


    <p>
        <?= Html::a('Tambah Foto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute' => 'nama',
                'label' => 'Nama',
            'headerOptions' => ['style' => 'width:70%'],
        // 'headerOptions' => ['style' => 'width:85%'],
        ],
            //'deskripsi:ntext',
            [
                'label' => 'Foto Thumbnail ',
                'attribute' => 'foto_thumbnail',
                'format' => 'raw',
                'value' => function($model) {
                        return '<a href=' . $model->foto_thumbnail . ' class="btn btn-sm btn-primary" target="_blank"><i class="fa fa-download"></i></a>';
                },
                'headerOptions' => ['style' => 'width:25%'],
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
