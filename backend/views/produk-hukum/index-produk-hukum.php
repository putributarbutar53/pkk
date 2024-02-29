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
                <h1>Produk Hukum</h1>
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
                        'attribute' => 'judul',
                        'headerOptions' => ['style' => 'width:88%'],
                    ],
                    [
                        'label' => 'File Download',
                        'attribute' => 'file',
                        'format' => 'raw',
                        'headerOptions' => ['style' => 'width:12%'],
                        'value' => function($model) {
                        return '<a href=' . $model->file . ' class="btn btn-sm btn-primary" target="_blank"><i class="fa fa-download"></i></a>';
                        }
                    ],
                ],
            ]);
            ?>
        </div>
        <figure class="signature-box centred"><img src="assets/images/icons/signature-2.png" alt=""></figure>
    </div>
</section>
<!-- ourstory-style-two end -->
