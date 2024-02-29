<?php
$findSlider = backend\models\Slider::find()
        ->where(['active' => 10])
        ->all();

$findBerita = \backend\models\Berita::find()
        ->where(['active' => 10, 'id_kategori' => 1, 'id_master_status' => 1])
        ->orderBy(['created_at' => SORT_DESC])
        ->limit(3)
        ->all();

$findBerita1 = \backend\models\Berita::find()
        ->where(['active' => 10, 'id_kategori' => 2, 'id_master_status' => 1])
        ->orderBy(['created_at' => SORT_DESC])
        ->limit(3)
        ->all();

$findEvent = \backend\models\Event::find()
        ->where(['active' => 10])
        ->orderBy(['created_at' => SORT_DESC])
        ->limit(3)
        ->all();

use yii\helpers\Url;
?>
<style>  
/* Extra small devices (phones, 600px and down) */
@media only screen and (max-width: 600px) {
    .alldevice {
        height:250px;
    }
    .ukuranHuruf {
        font-size: 7pt;
        line-height:1.5;
    }
}

/* Small devices (portrait tablets and large phones, 600px and up) */
@media only screen and (min-width: 600px) {
    .alldevice {
        width:100%; height:auto;min-height:500px;
    }
    .ukuranHuruf {
        font-size: 15pt;
        line-height:1.3;
    }
}
</style>
<!-- banner-section -->
<section class="banner-section style-two" >
    <div class="banner-carousel owl-theme owl-carousel owl-dots-none">
        <?php
        foreach ($findSlider as $fs) {
            echo '<div class="slide-item alldevice ukuranHuruf">
            <div class="image-layer" style=" background-image:url(' . $fs->foto . ')"></div>
            <div style="position:absolute;bottom:0;">
                <p style="background-color: #68F3F8;color:black;">' . strip_tags($fs->keterangan) . '</p>
            </div>
        </div>';
//            echo '<div class="slide-item">
//            <div class="image-layer" style="background-image:url(' . $fs->foto . ')"></div>
//            <div class="auto-container">
//                <div class="row clearfix">
//                    <div style="position: relative; top:200px;">
//                        <div class="content-box">
//                            <h2 style="color:black;background-color: #68F3F8; font-size:2.5vw;">' . strip_tags($fs->keterangan) . '</h2>
//                        </div>
//                    </div>
//                </div>
//            </div>
//        </div>';
}
        ?>
    </div>
</section>
<!-- banner-section end -->

<!-- service-section -->
<section class="service-section sec-pad centred" style="background-image: url(bagery/assets/images/background/background.jpg);">
    <div class="auto-container">
        <div class="sec-title centred">
            <h2>KELOMPOK KERJA PKK</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-3 service-block">
                <div class="service-block-one">
                    <div class="inner-box">
                        <div class="icon-box wow fadeInDown animated animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                            <a href="<?= Url::toRoute(['pokja-sekretariat/index-program-pokjasekre', 'id_jenis_pokja' => 1]) ?>" class="bg-layer" style="background-image: url(logo/Sekretariat.png);"></a>
                        </div>
                        <div class="lower-content wow fadeInUp animated animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                            <h5><a href="<?= Url::toRoute(['pokja-sekretariat/index-program-pokjasekre', 'id_jenis_pokja' => 1]) ?>">SEKRETARIAT</a></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 service-block">
                <div class="service-block-one">
                    <div class="inner-box">
                        <div class="icon-box wow fadeInDown animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <a href="<?= Url::toRoute(['pokja-sekretariat/index-program-pokjasekre', 'id_jenis_pokja' => 2]) ?>" class="bg-layer" style="background-image: url(logo/Pokja1.png);"></a>
                        </div>
                        <div class="lower-content wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <h5><a href="<?= Url::toRoute(['pokja-sekretariat/index-program-pokjasekre', 'id_jenis_pokja' => 2]) ?>">POKJA I</a></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 service-block">
                <div class="service-block-one">
                    <div class="inner-box">
                        <div class="icon-box wow fadeInDown animated animated" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <a href="<?= Url::toRoute(['pokja-sekretariat/index-program-pokjasekre', 'id_jenis_pokja' => 3]) ?>" class="bg-layer" style="background-image: url(logo/Pokja2.png);"></a>
                        </div>
                        <div class="lower-content wow fadeInUp animated animated" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <h5><a href="<?= Url::toRoute(['pokja-sekretariat/index-program-pokjasekre', 'id_jenis_pokja' => 3]) ?>">POKJA II</a></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 service-block">
                <div class="service-block-one">
                    <div class="inner-box">
                        <div class="icon-box wow fadeInDown animated animated" data-wow-delay="400ms" data-wow-duration="1500ms">
                            <a href="<?= Url::toRoute(['pokja-sekretariat/index-program-pokjasekre', 'id_jenis_pokja' => 4]) ?>" class="bg-layer" style="background-image: url(logo/Pokja3.png);"></a>
                        </div>
                        <div class="lower-content wow fadeInUp animated animated" data-wow-delay="400ms" data-wow-duration="1500ms">
                            <h5><a href="<?= Url::toRoute(['pokja-sekretariat/index-program-pokjasekre', 'id_jenis_pokja' => 4]) ?>">POKJA III</a></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 service-block">
                <div class="service-block-one">
                    <div class="inner-box">
                        <div class="icon-box wow fadeInDown animated animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                            <a class="bg-layer" href="<?= Url::toRoute(['pokja-sekretariat/index-program-pokjasekre', 'id_jenis_pokja' => 5]) ?>" style="background-image: url(logo/Pokja4.png);"></a>
                        </div>
                        <div class="lower-content wow fadeInUp animated animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                            <h5><a href="<?= Url::toRoute(['pokja-sekretariat/index-program-pokjasekre', 'id_jenis_pokja' => 5]) ?>"">POKJA IV</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- service-section end -->


<!-- news-section -->
<section class="news-section sec-pad" style="background-image: url(bagery/assets/images/background/background.jpg);">
    <div class="auto-container">
        <div class="sec-title centred">
            <h2>BERITA TP PKK KABUPATEN TERBARU</h2>
        </div>
        <div class="row clearfix">
            <?php
            foreach ($findBerita as $fb) {
                $user = \common\models\User::find()
                                ->where(['id' => $fb->created_by])
                                ->one();
                        echo'<div class="col-lg-4 col-md-6 col-sm-12 news-block">
                        <div class="news-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                        <figure class="image-box">
                            <a><img src="' . Yii::getAlias('@web') . '/' . $fb->foto . '" alt="" style="height:213px"></a>
                        </figure>
                        <div class="lower-content">
                            <ul class="post-info clearfix">
                                <li>' . date("d M Y", strtotime($fb->created_at)) . '</li>
                                <li>/</li>
                                <li><a>' . $user->username . '</a></li>
                            </ul>
                            <h3><a>' . $fb->judul . '</a></h3>
                            <p>' . substr(strip_tags($fb->isi), 0, 150) . ' ......</p>
                            <div class="btn-box"><a href="' . Url::toRoute(['berita/view-bertikel', 'id' => $fb->id]) . '" class="theme-btn-two">Selengkapnya</a></div>
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

<!-- news-section -->
<section class="news-section sec-pad" style="background-image: url(bagery/assets/images/background/background.jpg);">
    <div class="auto-container">
        <div class="sec-title centred">
            <h2>BERITA TP PKK KECAMATAN TERBARU</h2>
        </div>
        <div class="row clearfix">
            <?php
            foreach ($findBerita1 as $fb1) {
                $user = \common\models\User::find()
                        ->where(['id' => $fb1->created_by])
            ->one();
                echo'<div class="col-lg-4 col-md-6 col-sm-12 news-block">
                        <div class="news-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                        <figure class="image-box">
                            <a><img src="' . Yii::getAlias('@web') . '/' . $fb1->foto . '" alt="" style="height:213px"></a>
                        </figure>
                        <div class="lower-content">
                            <ul class="post-info clearfix">
                                <li>' . date("d M Y", strtotime($fb1->created_at)) . '</li>
                                <li>/</li>
                                <li><a>' . $user->username . '</a></li>
                            </ul>
                            <h3><a>' . $fb1->judul . '</a></h3>
                            <p>' . substr(strip_tags($fb1->isi), 0, 150) . ' ......</p>
                            <div class="btn-box"><a href="' . Url::toRoute(['berita/view-bertikel', 'id' => $fb1->id]) . '" class="theme-btn-two">Selengkapnya</a></div>
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

<!-- news-section -->
<section class="news-section sec-pad" style="background-image: url(bagery/assets/images/background/background.jpg);">
    <div class="auto-container">
        <div class="sec-title centred">
            <h2>KEGIATAN / EVENT</h2>
        </div>
        <div class="row clearfix">
            <?php
                    foreach ($findEvent as $fE) {
                        $user = \common\models\User::find()
                    ->where(['id' => $fE->created_by])
                                ->one();
                    echo'<div class="col-lg-4 col-md-6 col-sm-12 news-block">
                <div class="news-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                <div class="inner-box">
                        <figure class="image-box">
                            <a><img src="' . Yii::getAlias('@web') . '/' . $fE->foto . '" alt="" style="height:213px"></a>
                        </figure>
                        <div class="lower-content">
                            <ul class="post-info clearfix">
                                <li>' . date("d M Y", strtotime($fE->created_at)) . '</li>
                                <li>/</li>
                                <li><a>' . $user->username . '</a></li>
                            </ul>
                            <h3><a">' . $fE->nama . '</a></h3>
                            <p>' . substr(strip_tags($fE->deskripsi), 0, 150) . ' ......</p>
                            <div class="btn-box"><a href="' . Url::toRoute(['event/view-event', 'id' => $fE->id]) . '" class="theme-btn-two">Selengkapnya</a></div>
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

