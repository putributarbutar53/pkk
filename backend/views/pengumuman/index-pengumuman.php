<?php
$pengumuman = \backend\models\Pengumuman::find()
        ->where(['active' => 10, 'id_master_status' => 1])
        ->orderBy(['created_at' => SORT_DESC])
        ->all();

use yii\helpers\Url;
?>
<!--Page Title-->
<section class="page-title centred" style="background-image: url(bagery/assets/images/background/background.jpg);">
    <div class="auto-container">
        <div class="content-box">
            <div class="title">
                <h1>Pengumuman</h1>
            </div>
            <ul class="bread-crumb clearfix">
                <p class="found-posts m-b0">Ditemukan <?= count($pengumuman) ?></p>
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
            foreach ($pengumuman as $pengumumans) {
                echo '<div class="col-lg-4 col-md-6 col-sm-12 news-block">
                <div class="news-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <figure class="image-box">
                            <a href="' . Url::toRoute(['pengumuman/view-pengumuman', 'id' => $pengumumans->id]) . '"><img src="' . Yii::getAlias('@web') . '/' . $pengumumans->thumbnail . '" alt="" style="height:213px"></a>
                        </figure>
                        <div class="lower-content">
                            <ul class="post-info clearfix">
                                <li>' . date("d M Y", strtotime($pengumumans->created_at)) . '</li>
                            </ul>
                            <h3><a>' . $pengumumans->judul . '</a></h3>
                            <p>' . substr(strip_tags($pengumumans->isi), 0, 200) . ' ......</p>
                            <div class="btn-box"><a href="' . Url::toRoute(['pengumuman/view-pengumuman', 'id' => $pengumumans->id]) . '" class="theme-btn-two">Selengkapnya</a></div>
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