<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\SejarahKetuaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sejarah Ketua';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sejarah-ketua-index">


    <p>
        <?= Html::a('Tambah Sejarah Ketua', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pembina',
        'ketua',
            [
            'attribute' => 'mulai',
            'label' => 'Mulai',
            'format' => 'raw',
            'value' => function($model) {
                return date("Y", strtotime($model->mulai));
            }
        ],
            [
            'attribute' => 'selesai',
            'label' => 'Selesai',
            'format' => 'raw',
            'value' => function($model) {
                return date("Y", strtotime($model->selesai));
            }
        ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
