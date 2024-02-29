<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ProfilPembinaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Profil Pembina';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profil-pembina-index">


    <p>
        <?= Html::a('Tambah Profil Pembina', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
            'attribute' => 'isi',
            'label' => 'Sejarah',
            'format' => 'raw',
            'headerOptions' => ['style' => 'width:95%'],
        ],
            [
            'label' => 'Foto ',
            'attribute' => 'foto',
            'format' => 'raw',
            'value' => function($model) {
                return '<a href=' . $model->foto . ' class="btn btn-sm btn-primary" target="_blank"><i class="fa fa-download"></i></a>';
            },
            'headerOptions' => ['style' => 'width:5%'],
        ],
        //'created_by',
            //'updated_by',
            //'active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
