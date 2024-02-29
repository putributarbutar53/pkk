<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\GaleriFotoChildSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Galeri Foto Children';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="galeri-foto-child-index">

    <p>
        <?= Html::a('Create Galeri Foto Child', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'id_galeri_foto',
            'foto',
            'created_at',
            'updated_at',
            //'created_by',
            //'updated_by',
            //'active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
