<!--Page Title-->
<section class="page-title centred" style="background-image: url(bagery/assets/images/background/background.jpg);">
    <div class="auto-container">
        <div class="content-box">
            <div class="title">
                <h1>Visi & Misi</h1>
            </div>
        </div>
    </div>
</section>
<!--End Page Title-->


<!-- ourstory-style-two -->
<section class="ourstory-style-two">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                <div class="text mr-10">
                    <div class="sec-title centred">
                        <h3>Visi</h3>
                    </div>
                    <?php
                    $visi = backend\models\Visi::find()->where(['active' => 10])->one();
                    echo $visi->isi ?? '-';
?>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                <div class="text mr-10">
                    <div class="sec-title centred">
                        <h3>Misi</h3>
                    </div>
                    <?php
                    $misi = backend\models\Misi::find()->where(['active' => 10])->one();
                    echo $misi->isi ?? '-';
?>
                </div>
            </div>
        </div>
        <figure class="signature-box centred"><img src="assets/images/icons/signature-2.png" alt=""></figure>
    </div>
</section>
<!-- ourstory-style-two end -->