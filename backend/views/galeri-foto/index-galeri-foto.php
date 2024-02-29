<!--Page Title-->
<section class="page-title centred" style="background-image: url(bagery/assets/images/background/page-title.jpg);">
    <div class="auto-container">
        <div class="content-box">
            <div class="title">
                <h1>Galeri Foto</h1>
            </div>
        </div>
    </div>
</section>
<!--End Page Title-->

<?php
$findGaleri = \backend\models\GaleriFoto::find()
        ->where(['active' => 10])
        ->orderBy(['created_at' => SORT_DESC])
        ->all();
            $findChildGaleri = backend\models\GaleriFotoChild::find()
                    ->where(['active' => 10])
                    ->all();
            ?>
<!-- project-style-two -->
<section class="project-style-two">
    <div class="auto-container">
        <div class="sortable-masonry">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12 col-sm-12 title-column">
                    <div class="title-inner">
                        <div class="sec-title">
                            <h2>Daftar Galery TP PKK</h2>
                        </div>
                        <div class="filters">
                            <ul class="filter-tabs filter-btns clearfix">
                                <?php
                                foreach ($findGaleri as $fg) {
                                    echo '<li class="" data-role="button" data-filter=".' . $fg->id . 'pkk"><span>' . $fg->nama . '</span></li>';
}
?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 content-column">
                    <div class="items-container row clearfix">
                        <?php
                        foreach ($findChildGaleri as $fcg) {
                            echo '<div class="col-lg-6 col-md-6 col-sm-12 masonry-item small-column ' . $fcg->id_galeri_foto . 'pkk">
                            <div class="project-block-one">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img src="' . $fcg->foto . '" alt="">
                                    </figure>
                                    <div class="lower-content">
                                        <div class="view-btn"><a href="' . $fcg->foto . '" class="lightbox-image" data-fancybox="gallery"><i class="icon-Zoom"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- project-style-two end -->