<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\KontakSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kontak';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kontak-index">
    
    <p>
        <?php
        $kontak = backend\models\Kontak::find()->all();
        if ($kontak != null) {
            
        } else {
            echo Html::a('Tambah Kontak', ['create'], ['class' => 'btn btn-success']);
        }
        ?>
    </p>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'alamat',
            'email:email',
            'telepon',
            'fax',
             'no_hp',
     //            'facebook',
//            'instagram',
//            'twitter',
//            'youtube',
        //'latitude',
            //'longitude',
            //'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',
            //'active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
