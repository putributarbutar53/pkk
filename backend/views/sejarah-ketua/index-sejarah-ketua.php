<?php

use yii\helpers\Url;

$beritaCount = \backend\models\Berita::find()
        ->where(['active' => 10, 'id_kategori' => 1])
        ->all();
$artikel = \backend\models\Berita::find()
        ->where(['active' => 10, 'id_kategori' => 2])
        ->all();
$kegiatanEvent = \backend\models\Event::find()
        ->where(['active' => 10])
        ->all();
$galerifoto = backend\models\GaleriFoto::find()
        ->where(['active' => 10])
        ->all();
$galeriVideo = \backend\models\GaleriVideo::find()
        ->where(['active' => 10])
        ->all();
$sejarahKetua = backend\models\SejarahKetua::find()
        ->where(['active' => 10])
        ->orderBy(['created_at' => SORT_DESC])
        ->all();
?>

<!--Page Title-->
<section class="page-title centred" style="background-image: url(bagery/assets/images/background/background.jpg);">
    <div class="auto-container">
        <div class="content-box">
            <div>
                <h1>Profil Ketua Dari Masa Ke Masa</h1>
            </div>
            <ul class="bread-crumb clearfix">
                <p class="found-posts m-b0">Tim Penggerak PKK Kabupaten Toba</p>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->

<!-- ourhistory-section -->
<section class="ourhistory-section sec-pad" style="background-image: url(assets/images/background/history-1.jpg);">
    <div class="auto-container">
        <div class="inner-content">
            <div class="line-box">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="row clearfix">
                <?php
                foreach ($sejarahKetua as $sK) {
                    echo'
                <div class="col-lg-5 col-md-12 col-sm-12 inner-column">
                    <div class="inner-box" >
                        <figure class="image-box mb-130"><img src="' . Yii::getAlias('@web') . '/' . $sK->foto . '" alt=""></figure>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 offset-lg-2 inner-column">
                    <div class="inner-box">
                        <div class="content-box mb-130">
                            <span class = "year">Periode ' . date("Y", strtotime($sK->mulai)) . ' - ' . date("Y", strtotime($sK->selesai)) . '</span>
                            <div>
                                <h5>Bupati Kabupaten Toba</h5>
                                <p>' . $sK->pembina . '</p>
                            </div><br>
                            <div>
                                <h5>Ketua TP PKK Kabupaten Toba</h5>
                                <p>' . $sK->ketua . '</p>
                            </div>
                        </div>
                    </div>
                </div>';
                }
                ?>
            </div>
        </div>
    </div>
</section>
<!-- ourhistory-section end -->
