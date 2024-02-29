<?php
$kontak = backend\models\Kontak::find()
        ->where(['active' => 10])
        ->one();
?>

<!--Page Title-->
<section class="page-title centred" style="background-image: url(bagery/assets/images/background/background.jpg);">
    <div class="auto-container">
                    <div class="content-box">
                        <div class="title">
                            <h1>Kontak TP PKK Kabupaten Toba</h1>
                        </div>
                    </div>
                </div>
            </section>
            <!--End Page Title-->


            <!-- contact-section -->
            <section class="contact-section alternet-2 sec-pad" style="background-image: url(bagery/assets/images/background/contact-3.jpg);">
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-6 col-sm-12 info-column">
                            <div class="contact-info-inner">
                                <div class="single-box">
                                    <h3>Alamat</h3>
                                    <ul class="list clearfix">
                                        <?php echo $kontak['alamat'];
                                        ?>
                                    </ul>
                                </div>
                                <div class="single-box">
                                    <h3>Telepon / HP / Fax</h3>
                                    <ul class="list clearfix">
                                        <li>
                                            <?php
                                            echo $kontak['telepon'];
                                            ?> 
                                        </li>
                                        <li>
                                            <?php
                                            echo $kontak['no_hp'];
                                            ?> 
                                        </li>
                                        <li>
                                            <?php
                                            echo $kontak['fax'];
                                            ?>
                                        </li>
                                    </ul>
                                </div>
                                <div class="single-box">
                                    <h3>Email</h3>
                                    <ul class="list clearfix"> 
                                        <li><a href="mailto:<?php
                                               echo $kontak['email'];
                                            ?>"><?php
                                               echo $kontak['email'];
                                            ?></a></li>
                                    </ul>
                                </div>
                                <div class="single-box">
                                    <h3>Media Sosial</h3>
                                    <ul class="social-links clearfix">
                                        <li><a href="<?= $kontak['facebook']; ?>"><i class="fab fa-facebook-f"></i> </a></li>
                                        <li><a href="<?= $kontak['twitter']; ?>"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="<?= $kontak['instagram']; ?>"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="<?= $kontak['youtube']; ?>"><i class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-6 col-sm-12 form-column">
                            <div class="form-inner">
                                <h3>Hubungi Kami</h3>
                                <form method="post" action="http://azim.commonsupport.com/Bagery/sendemail.php" id="contact-form" class="default-form">
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input type="text" name="username" placeholder="Masukkan Nama *" required="">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input type="email" name="email" placeholder="Masukkan Email *" required="">
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                            <input type="text" name="phone" required="" placeholder="Masukkan No. Hp">
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                            <input type="text" name="subject" required="" placeholder="Masukkan Subjek">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <textarea name="message" placeholder="Masukkan Pesan ..."></textarea>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                            <button class="theme-btn-one" type="submit" name="submit-form">Kirim</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- contact-section end -->


            <!-- google-map-section -->
            <section class="google-map-section">
                <div class="map-inner">
                    <div
                        class="google-map"
                        id="contact-google-map"
                        data-map-lat="40.712776"
                        data-map-lng="-74.005974"
                        data-icon-path="bagery/assets/images/icons/map-marker.png"
                        data-map-title="Brooklyn, New York, United Kingdom"
                        data-map-zoom="12"
                        data-markers='{
                        "marker-1": [40.712776, -74.005974, "<h4>Branch Office</h4><p>77/99 New York</p>","bagery/assets/images/icons/map-marker.png"]
                        }'>

                    </div>
                </div>
            </section>
            <!-- google-map-section end -->

        <!-- map script -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-CE0deH3Jhj6GN4YvdCFZS7DpbXexzGU"></script>
        <script src="bagery/assets/js/gmaps.js"></script>
        <script src="bagery/js/map-helper.js"></script>

