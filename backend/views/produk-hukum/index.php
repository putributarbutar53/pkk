<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ProdukHukumSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Produk Hukum';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produk-hukum-index">


    <p>
        <?= Html::a('Tambah Produk Hukum', ['create'], ['class' => 'btn btn-success']) ?>
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
            }
        ],
            [
            'attribute' => 'file',
            'format' => 'raw',
            'label' => 'File',
            'value' => function($model) {
                return '<a href=' . $model->file . ' class="btn btn-sm btn-primary" target="_blank"><i class="fa fa-download"></i></a>';
            },
        ],
            [
            'attribute' => 'id_master_status',
            'format' => 'raw',
            'label' => 'Status',
            'value' => function($model) {
                return $model->masterStatus->nama;
            }
        ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
