<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\GaleriVideoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Galeri Video';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="galeri-video-index">


    <p>
        <?= Html::a('Tambah Video', ['create'], ['class' => 'btn btn-success']) ?>
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
            'format' => 'raw',
            'headerOptions' => ['style' => 'width:60%'],
        ],
        'url:url',
// 'foto_thumbnail',
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
