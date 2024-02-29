<?php
$event = \backend\models\Event::find()
        ->where(['active' => 10,])
        ->orderBy(['created_at' => SORT_DESC])
        ->all();

use yii\helpers\Url;
?>
<!--Page Title-->
<section class="page-title centred" style="background-image: url(bagery/assets/images/background/page-title.jpg);">
    <div class="auto-container">
        <div class="content-box">
            <div class="title">
                <h1>Kegiatan / Event</h1>
            </div>
            <ul class="bread-crumb clearfix">
                <p class="found-posts m-b0">Ditemukan <?= count($event) ?></p>
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
             foreach ($event as $events) {
                echo '<div class="col-lg-4 col-md-6 col-sm-12 news-block">
                <div class="news-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <figure class="image-box">
                            <a href="' . Url::toRoute(['event/view-event', 'id' => $events->id]) . '"><img src="' . Yii::getAlias('@web') . '/' . $events->foto . '" alt="" style="height:213px"></a>
                        </figure>
                        <div class="lower-content">
                            <ul class="post-info clearfix">
                                <li>' . date("d M Y", strtotime($events->created_at)) . '</li>
                            </ul>
                            <h3><a>' . $events->nama . '</a></h3>
                            <p>' . substr(strip_tags($events->deskripsi), 0, 150) . ' ......</p>
                            <div class="btn-box"><a href="' . Url::toRoute(['event/view-event', 'id' => $events->id]) . '" class="theme-btn-two">Selengkapnya</a></div>
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