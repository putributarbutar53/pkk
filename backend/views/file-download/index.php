<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\FileDownoadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pedoman dan Juknis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="file-download-index">


    <p>
        <?= Html::a('Tambah Pedoman dan Juknis', ['create'], ['class' => 'btn btn-success']) ?>
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
                'headerOptions' => ['style' => 'width:90%'],
            ],
            [
                'label' => 'File ',
                'attribute' => 'file',
                'format' => 'raw',
                'headerOptions' => ['style' => 'width:5%'],
                'value' => function($model) {
                        return '<a href=' . $model->file . ' class="btn btn-sm btn-primary" target="_blank"><i class="fa fa-download"></i></a>';
                }
            ],
            [
                'attribute' => 'jumlah_download',
                'headerOptions' => ['style' => 'width:5%'],
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
