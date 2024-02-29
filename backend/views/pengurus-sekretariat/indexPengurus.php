<?php

use yii\helpers\Url;
use yii\grid\GridView;
use kartik\detail\DetailView;

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
$pengurus = backend\models\PengurusSekretariat::find()
        ->where(['active' => 10])
        ->one();

$pengurusPokja = backend\models\PengurusPokja::find()
        ->where(['active' => 10])
        ->all();
?>

<!--Page Title-->
<section class="page-title centred" style="background-image: url(bagery/assets/images/background/background.jpg);">
    <div class="auto-container">
        <div class="content-box">
            <div>
                <h1>Susunan Pengurus</h1>
            </div>
            <ul class="bread-crumb clearfix">
                <p class="found-posts m-b0">Tim Penggerak PKK Kabupaten Toba</p>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->



<!-- sidebar-page-container -->
<section class="sidebar-page-container sec-pad-2 blog-details">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                <div class="blog-details-content">
                    <div class="inner-box">
                        <?php
                        if ($pengurus != null) {
                            echo DetailView::widget([
                                'model' => $pengurus,
                                'condensed' => true,
                                'hover' => true,
                                'mode' => DetailView::MODE_VIEW,
                                'panel' => [
                                    'heading' => 'Pengurus Sekretariat',
                                    'type' => DetailView::TYPE_INFO,
                                ],
                                'buttons1' => '',
                                'hAlign' => 'left',
                                'vAlign' => 'top',
                                'attributes' => [
                                        [
                                        'attribute' => 'ketua',
                                        'label' => 'Ketua',
                                        'value' => $pengurus->ketua
                                    ],
                                        [
                                        'attribute' => 'ketua_1',
                                        'label' => 'Ketua 1',
                                        'value' => $pengurus->ketua_1
                                    ],
                                        [
                                        'attribute' => 'sekretaris',
                                        'label' => 'Sekretaris',
                                        'value' => $pengurus->sekretaris
                                    ],
                                        [
                                        'attribute' => 'bendahara',
                                        'label' => 'Bendahara',
                                        'value' => $pengurus->bendahara
                                    ],
                                ],
                            ]);
                        } else {
                            echo "Data Kosong";
                        }
                        ?>
                    </div>
                    <div class="inner-box">
                        <?php
                        if ($pengurusPokja != null) {
                            foreach ($pengurusPokja as $pengurusPokjas) {
                                echo DetailView::widget([
                                    'model' => $pengurusPokjas,
                                    'condensed' => true,
                                    'hover' => true,
                                    'mode' => DetailView::MODE_VIEW,
                                    'panel' => [
                                        'heading' => $pengurusPokjas->jenisPokja->nama,
                                        'type' => DetailView::TYPE_INFO,
                                    ],
                                    'buttons1' => '',
                                    'hAlign' => 'left',
                                    'vAlign' => 'top',
                                    'attributes' => [
                                            [
                                            'attribute' => 'ketua',
                                            'label' => 'Ketua',
                                            'value' => $pengurusPokjas->ketua
                                        ],
                                            [
                                            'attribute' => 'wakil_ketua',
                                            'label' => 'Wakil Ketua',
                                            'value' => $pengurusPokjas->wakil_ketua
                                        ],
                                    ],
                                ]);
                                $searchModelx = new \backend\models\search\AnggotaPokjaSearch();
                                $dataProviderx = $searchModelx->searchAnggota(Yii::$app->request->queryParams, $pengurusPokjas->id);
                                echo GridView::widget([
                                    'dataProvider' => $dataProviderx,
//                                'filterModel' => $searchModelx,
                                    'columns' => [
                                            [
                                            'attribute' => 'nama',
                                            'label' => 'Anggota',
                                            'format' => 'raw'
                                        ]
                                    ],
                                ]);
                            }
                        } else {
                            echo "-";
                        }
                        ?>

                    </div>
                    <div class="post-share-option clearfix">
                        <div class="text pull-left"><h3>We Are Social On:</h3></div>
                        <ul class="social-links pull-right clearfix">
                            <?php
                            $kontak = \backend\models\Kontak::find()
                                    ->where(['active' => 10])
                                    ->one();
                            ?>
                            <li><a href="<?= $kontak['facebook']; ?>"><i class="fab fa-facebook-f"></i> </a></li>
                            <li><a href="<?= $kontak['instagram']; ?>"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="<?= $kontak['twitter']; ?>"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="<?= $kontak['youtube']; ?>"><i class="fab fa-youtube"></i></a></li>> </ul>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                <div class="blog-sidebar default-sidebar">
                    <div class="sidebar-widget post-widget">
                        <div class="widget-title">
                            <h3>Berita dan Artikel Terbaru</h3>
                        </div>
                        <?php
                        $findBeritaTerbaru = backend\models\Berita::find()
                                ->where(['active' => 10])
                                ->orderBy(['created_at' => SORT_DESC])
                                ->limit(4)
                                ->all();
                        foreach ($findBeritaTerbaru as $fBT) {
                            echo '
                        <div class="post-inner">
                            <div class="post">
                                <figure class="post-thumb"><a><img src="' . Yii::getAlias('@web') . '/' . $fBT->foto . '" alt=""></a></figure>
                                <h5><a href="' . Url::toRoute(['berita/view-bertikel', 'id' => $fBT->id]) . '">' . $fBT->judul . '</a></h5>
                                <p>' . date("d M Y", strtotime($fBT->created_at)) . '</p>
                            </div>
                        </div>';
                        }
                        ?>
                    </div>
                    <div class="sidebar-widget sidebar-archives">
                        <div class="widget-title">
                            <h3>Info Publik</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="archives-list clearfix">
                                <li><a href="<?= Url::toRoute(['berita/index-bertikel', 'id_kategori' => 1]) ?>">Berita<span>(<?= count($beritaCount) ?>)</a> </span></li>
                                <li><a href="<?= Url::toRoute(['berita/index-bertikel', 'id_kategori' => 2]) ?>">Artikel<span>(<?= count($artikel) ?>)</a> </span></li>
                                <li><a href="<?= Url::toRoute(['galeri-foto/index-galeri']) ?>">Galeri Foto<span>(<?= count($galerifoto) ?>)</a> </span></li>
                                <li><a href="<?= Url::toRoute(['galeri-video/index-galeri']) ?>">Galeri Video<span>(<?= count($galeriVideo) ?>)</a> </span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- sidebar-page-container end -->