<?php
$galerivideo = \backend\models\GaleriVideo::find()
        ->where(['active' => 10])
        ->orderBy(['created_at' => SORT_DESC])
        ->all();
?>
<!--Page Title-->
<section class="page-title centred" style="background-image: url(bagery/assets/images/background/page-title.jpg);">
    <div class="auto-container">
        <div class="content-box">
            <div class="title">
                <h1>Galeri Video</h1>
            </div>
            <ul class="bread-crumb clearfix">
                <p class="found-posts m-b0">Ditemukan <?= count($galerivideo) ?> Video</p>
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
            foreach ($galerivideo as $galerivideos) {
                echo '<div class="col-lg-4 col-md-6 col-sm-12 news-block">
                <div class="news-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <figure class="image-box">
                            <iframe src="' . $galerivideos->url . '" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </figure>
                        <div class="lower-content">
                            <ul class="post-info clearfix">
                                <li>' . date("d M Y", strtotime($galerivideos->created_at)) . '</li>
                                <li>/</li>
                                <li><a href="blog-details.html">by admin</a></li>
                            </ul>
                            <h3>' . $galerivideos->nama . '</h3>
                        </div>
                    </div>
                </div>
            </div>';
            }
            ?>
        </div>
        <!--        <div class="pagination-wrapper centred">
                    <ul class="pagination">
                <li><a href="blog-grid.html">Prev</a></li>
                <li><a href="blog-grid.html">1</a></li>
                <li><a href="blog-grid.html" class="active">2</a></li>
                <li><a href="blog-grid.html">3</a></li>
                <li><a href="blog-grid.html">4</a></li>
                <li><a href="blog-grid.html">5</a></li>
                <li><a href="blog-grid.html">Next</a></li>
            </ul>
                </div>-->
    </div>
</section>
<!-- news-section end -->