<?php

use yii\helpers\Url;

$berita = \backend\models\Berita::find()
        ->where(['active' => 10, 'id_kategori' => $id_kategori, 'id_master_status' => 1])
        ->orderBy(['created_at' => SORT_DESC])
        ->all();
$beritaCount = \backend\models\Berita::find()
        ->where(['active' => 10, 'id_kategori' => 1, 'id_master_status' => 1])
        ->all();
$artikel = \backend\models\Berita::find()
        ->where(['active' => 10, 'id_kategori' => 2, 'id_master_status' => 1])
        ->all();

$kategori = backend\models\MasterKategori::findOne($id_kategori);
?>
<!--Page Title-->
<section class="page-title centred" style="background-image: url(bagery/assets/images/background/background.jpg);">
    <div class="auto-container">
        <div class="content-box">
            <div class="title">
                <h1>Berita <?= $kategori->nama ?></h1>
            </div>
            <ul class="bread-crumb clearfix">
                <p class="found-posts m-b0">Ditemukan <?= count($berita) . ' Berita ' . $kategori->nama ?></p>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->


<!-- news-section -->
<section class="news-section sec-pad-2 blog-grid">
    <div class="auto-container">
        <div class="row clearfix">
            <?php
            foreach ($berita as $beritas) {
                echo '<div class="col-lg-4 col-md-6 col-sm-12 news-block">
                <div class="news-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <figure class="image-box">
                            <a href="' . Url::toRoute(['berita/view-bertikel', 'id' => $beritas->id]) . '"><img src="' . Yii::getAlias('@web') . '/' . $beritas->foto . '" alt="" style="height:213px"></a>
                        </figure>
                        <div class="lower-content">
                            <ul class="post-info clearfix">
                                <li>' . date("d M Y", strtotime($beritas->created_at)) . '</li>
                            </ul>
                            <h3><a>' . $beritas->judul . '</a></h3>
                            <p>' . substr(strip_tags($beritas->isi), 0, 150) . ' ......</p>
                            <div class="btn-box"><a href="' . Url::toRoute(['berita/view-bertikel', 'id' => $beritas->id]) . '" class="theme-btn-two">Selengkapnya</a></div>
                        </div>
                    </div>
                </div>
            </div>';
                }
                ?>
        </div>
    </div>
</section>
<!-- news-section end -->
