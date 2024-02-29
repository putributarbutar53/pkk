<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\PrestasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Prestasi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prestasi-index">


    <p>
        <?= Html::a('Tambah Prestasi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
            'attribute' => 'prestasi',
            'format' => 'raw',
            'label' => 'Prestasi',
            'value' => function($model) {
                return $model->prestasi;
            }
        ], [
            'attribute' => 'jenis_lomba',
            'format' => 'raw',
            'label' => 'Jenis Lomba',
            'value' => function($model) {
                return $model->jenis_lomba;
            }
        ], [
            'attribute' => 'tahun',
            'format' => 'raw',
            'label' => 'Tahun',
            'value' => function($model) {
                return date("Y", strtotime($model->tahun));
            }
        ],
        //'updated_at',
            //'created_by',
            //'updated_by',
            //'active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
