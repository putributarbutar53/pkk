<?php

use yii\helpers\Url;

$berita = \backend\models\Berita::find()
        ->where(['active' => 10, 'id_kategori' => $id_kategori])
        ->orderBy(['created_at' => SORT_DESC])
        ->all();
$beritaCount = \backend\models\Berita::find()
        ->where(['active' => 10, 'id_kategori' => 1])
        ->all();
$artikel = \backend\models\Berita::find()
        ->where(['active' => 10, 'id_kategori' => 2])
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
            <!--            <ul class="bread-crumb clearfix">
                            <p class="found-posts m-b0">Ditemukan <?= count($berita) . ' Berita ' . $kategori->nama ?></p>
                        </ul>-->
        </div>
    </div>
</section>
<!--End Page Title-->


<!-- ourmenu-section -->
<section class="ourmenu-section sec-pad">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-3 inner-column">
                <div class="inner-box">
                    <div class="single-menu-box">
                        <div class="btn-box"><h4><a href=<?= Url::toRoute(['berita/index-bertikel', 'id_penulis' => 2]) ?>" class="theme-btn-two">KECAMATAN BALIGE</a></div>
                    </div>
                    <div class="single-menu-box">
                        <div class="btn-box"><h4><a href=<?= Url::toRoute(['berita/index-bertikel', 'id_penulis' => 3]) ?>" class="theme-btn-two">KECAMATAN LAGUBOTI</a></div>
                    </div>
                    <div class="single-menu-box">
                        <div class="btn-box"><h4><a href=<?= Url::toRoute(['berita/index-bertikel', 'id_penulis' => 4]) ?>" class="theme-btn-two">KECAMATAN TAMPAHAN</a></div>
                    </div>
                    <div class="single-menu-box">
                        <div class="btn-box"><h4><a href=<?= Url::toRoute(['berita/index-bertikel', 'id_penulis' => 5]) ?>" class="theme-btn-two">KECAMATAN SIANTAR NARUMONDA</a></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 inner-column">
                <div class="inner-box">
                    <div class="single-menu-box">
                        <div class="btn-box"><h4><a href=<?= Url::toRoute(['berita/index-bertikel', 'id_penulis' => 6]) ?>" class="theme-btn-two">KECAMATAN SIGUMPAR</a></div>
                    </div>
                    <div class="single-menu-box">
                        <div class="btn-box"><h4><a href=<?= Url::toRoute(['berita/index-bertikel', 'id_penulis' => 7]) ?>" class="theme-btn-two">KECAMATAN SILAEN</a></div>
                    </div>
                    <div class="single-menu-box">
                        <div class="btn-box"><h4><a href=<?= Url::toRoute(['berita/index-bertikel', 'id_penulis' => 8]) ?>" class="theme-btn-two">KECAMATAN HABINSARAN</a></div>
                    </div>
                    <div class="single-menu-box">
                        <div class="btn-box"><h4><a href=<?= Url::toRoute(['berita/index-bertikel', 'id_penulis' => 14]) ?>" class="theme-btn-two">KECAMATAN PINTU POHAN</a></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 inner-column">
                <div class="inner-box">
                    <div class="single-menu-box">
                        <div class="btn-box"><h4><a href=<?= Url::toRoute(['berita/index-bertikel', 'id_penulis' => 10]) ?>" class="theme-btn-two">KECAMATAN BORBOR</a></div>
                    </div>
                    <div class="single-menu-box">
                        <div class="btn-box"><h4><a href=<?= Url::toRoute(['berita/index-bertikel', 'id_penulis' => 11]) ?>" class="theme-btn-two">KECAMATAN ULUAN</a></div>
                    </div>
                    <div class="single-menu-box">
                        <div class="btn-box"><h4><a href=<?= Url::toRoute(['berita/index-bertikel', 'id_penulis' => 12]) ?>" class="theme-btn-two">KECAMATAN PORSEA</a></div>
                    </div>
                    <div class="single-menu-box">
                        <div class="btn-box"><h4><a href=<?= Url::toRoute(['berita/index-bertikel', 'id_penulis' => 15]) ?>" class="theme-btn-two">KECAMATAN BONATUA LUNASI</a></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 inner-column">
                <div class="inner-box">
                    <div class="single-menu-box">
                        <div class="btn-box"><h4><a href=<?= Url::toRoute(['berita/index-bertikel', 'id_penulis' => 9]) ?>" class="theme-btn-two">KECAMATAN NASSAU</a></div>
                    </div>
                    <div class="single-menu-box">
                        <div class="btn-box"><h4><a href=<?= Url::toRoute(['berita/index-bertikel', 'id_penulis' => 13]) ?>" class="theme-btn-two">KECAMATAN PARMAKSIAN</a></div>
                    </div>
                    <div class="single-menu-box">
                        <div class="btn-box"><h4><a href=<?= Url::toRoute(['berita/index-bertikel', 'id_penulis' => 17]) ?>" class="theme-btn-two">KECAMATAN AJIBATA</a></div>
                    </div>
                    <div class="single-menu-box">
                        <div class="btn-box"><h4><a href=<?= Url::toRoute(['berita/index-bertikel', 'id_penulis' => 16]) ?>" class="theme-btn-two">KECAMATAN LUMBAN JULU</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ourmenu-section -->