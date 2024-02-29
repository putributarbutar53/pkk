<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
?>

<!-- comment --><!--Page Title-->
<section class="page-title centred" style="background-image: url(bagery/assets/images/background/background.jpg);">
    <div class="auto-container">
        <div class="content-box">
            <div class="title">
                <h1>Prestasi TP PKK Kabupaten Toba</h1>
            </div>
        </div>
    </div>
</section>
<!--End Page Title-->

<section class="ourstory-style-two">
    <div class="auto-container" >
        <div class="row clearfix" style="color:black" >
            <?php
            echo GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'options' => ['style' => 'width:100%'],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    // 'id',
                    [
            'attribute' => 'tahun',
            'headerOptions' => ['style' => 'width:10%'],
            'value' => function($model) {
                return date("Y", strtotime($model->tahun));
            }
        ],
        [
            'attribute' => 'prestasi',
            'headerOptions' => ['style' => 'width:20%'],
        ],
        [
            'attribute' => 'jenis_lomba',
            'headerOptions' => ['style' => 'width:70%'],
        ],
    ],
            ]);
            ?>
        </div>
        <figure class="signature-box centred"><img src="assets/images/icons/signature-2.png" alt=""></figure>
    </div>
</section>
<!-- ourstory-style-two end -->
