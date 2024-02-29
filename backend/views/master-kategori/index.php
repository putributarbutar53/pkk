<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\MasterKategoriSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Master Kategori';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-kategori-index">

    <p>
        <?= Html::a('Tambah Master Kategori', ['create'], ['class' => 'btn btn-success']) ?>
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
            'headerOptions' => ['style' => 'width:95%'],
        // 'headerOptions' => ['style' => 'width:85%'],
        ],
        // 'created_at',
            // 'updated_at',
            // 'created_by',
            //'updated_by',
            //'active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
