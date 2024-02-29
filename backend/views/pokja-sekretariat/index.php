<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\JenisPokja;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\PokjaSekretariatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pokja & Sekretariat';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pokja-sekretariat-index">

    <p>
        <?= Html::a('Tambah Pokja & Sekretariat', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

    //            'id',
        [
            'attribute' => 'id_jenis_pokja',
            'label' => 'Jenis Pokja',
            'headerOptions' => ['style' => 'width:60%'],
            'value' => function($model) {
                $findJenis = JenisPokja::findOne($model->id_jenis_pokja);
                return $findJenis->nama;
            }
        ],
//            'program_kerja:ntext',
         [
            'label' => 'Data',
            'attribute' => 'papan_data',
            'format' => 'raw',
            'value' => function($model) {
                return '<center><a href=' . $model->papan_data . ' class="btn btn-md btn-primary" target="_blank"><i class="fa fa-download"></i></a></center>';
            },
            'headerOptions' => ['style' => 'width:40%'],
        ],
        //            'created_at',
        //'updated_at',
            //'created_by',
            //'updated_by',
            //'active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
