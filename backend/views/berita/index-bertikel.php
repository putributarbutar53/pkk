<?php

use yii\helpers\Url;

$berita = \backend\models\Berita::find()
        ->where(['active' => 10, 'id_penulis' => $id_penulis, 'id_master_status' => 1])
        ->orderBy(['created_at' => SORT_DESC])
        ->all();
$beritaCount = \backend\models\Berita::find()
        ->where(['active' => 10, 'id_kategori' => 1, 'id_master_status' => 1])
        ->all();
$artikel = \backend\models\Berita::find()
        ->where(['active' => 10, 'id_kategori' => 2, 'id_master_status' => 1])
        ->all();

$user = common\models\User::findOne($id_penulis);
?>
<!--Page Title-->
<section class="page-title centred" style="background-image: url(bagery/assets/images/background/background.jpg);">
    <div class="auto-container">
        <div class="content-box">
            <div class="title">
                <h1>Berita <?php echo ucwords(str_replace(".", " ", $user->username)) ?></h1>
            </div>
            <ul class="bread-crumb clearfix">
                <p class="found-posts m-b0">Ditemukan <?php echo count($berita) . ' Berita ' . ucwords(str_replace(".", " ", $user->username)) ?></p>
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
                echo '
            
            <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                <div class="news-block-one wow fadeInUp animated animated" data-wow-delay="600ms" data-wow-duration="1500ms"">
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
                            <div class="btn-box"><a href="blog-details.html" class="theme-btn-two">Read More</a></div>
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
