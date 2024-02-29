<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Event';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-index">

    <p>
        <?= Html::a('Tambah Event', ['create'], ['class' => 'btn btn-success']) ?>
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
                'format' => 'raw',
                'headerOptions' => ['style' => 'width:90%'],
            ],
            // 'deskripsi:ntext',
            // 'foto',
            // 'file',
            [
                'attribute' => 'waktu_mulai',
                'format' => 'raw',
                'headerOptions' => ['style' => 'width:5%'],
                'value' => function($model) {
                    return date("d-M-Y", strtotime($model->waktu_mulai));
                },
            ],
            [
                'attribute' => 'waktu_selesai',
                'format' => 'raw',
                'headerOptions' => ['style' => 'width:5%'],
                'value' => function($model) {
                    return date("d-M-Y", strtotime($model->waktu_selesai));
            },
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
