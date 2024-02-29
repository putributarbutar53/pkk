<?php

use yii\helpers\Url;

$kontak = \backend\models\Kontak::find()
        ->where(['active' => 10])
        ->one();
?>

<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from azim.commonsupport.com/Bagery/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Jul 2021 04:56:45 GMT -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

        <title>PKK Kabupaten TOBA</title>

        <!-- Fav Icon -->
        <link rel="icon" href="logo/logo_pkk.ico" type="image/x-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,600;0,700;0,800;0,900;1,300;1,400;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">

        <!-- Stylesheets -->
        <link href="bagery/assets/css/font-awesome-all.css" rel="stylesheet">
        <link href="bagery/assets/css/flaticon.css" rel="stylesheet">
        <link href="bagery/assets/css/owl.css" rel="stylesheet">
        <link href="bagery/assets/css/bootstrap.css" rel="stylesheet">
        <link href="bagery/assets/css/jquery.fancybox.min.css" rel="stylesheet">
        <link href="bagery/assets/css/animate.css" rel="stylesheet">
        <link href="bagery/assets/css/color.css" rel="stylesheet">
        <link href="bagery/assets/css/nice-select.css" rel="stylesheet">
        <link href="bagery/assets/css/global.css" rel="stylesheet">
        <link href="bagery/assets/css/style.css" rel="stylesheet">
        <link href="bagery/assets/css/responsive.css" rel="stylesheet">

    </head>


    <!-- page wrapper -->
    <body>

        <div class="boxed_wrapper">


            <!-- preloader -->
            <div class="loader-wrap">
                <div class="preloader">
                    <div id="handle-preloader" class="handle-preloader">
                        <div class="animation-preloader">
                            <div class="spinner"></div>
                            <div class="txt-loading">
                                <span data-text-preloader="" class="letters-loading">
                                    P
                                </span>
                                <span data-text-preloader="" class="letters-loading">
                                    K
                                </span>
                                <span data-text-preloader="" class="letters-loading">
                                    K
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- preloader end -->


            <!-- main header -->
            <header class="main-header style-two" >
                <!-- header-lower -->
                <div class="header-lower" >
                    <div class="pattern-layer" ></div>
                    <div class="outer-box">
                        <div class="auto-container">
                            <div class="menu-area clearfix">
                                <!--Mobile Navigation Toggler-->
                                <div class="mobile-nav-toggler">
                                    <li class="logo-box" style="margin: -40px -100px -40px -280px">
                                        <figure class="logo" style="max-width: 180px;"><a href="<?= Url::toRoute(['site/index']) ?>"><img src="logo/logo_pkk4.png" alt=""></a></figure>
                                    </li>
                                    <i class="icon-bar"></i>
                                    <i class="icon-bar"></i>
                                    <i class="icon-bar"></i>
                                </div>
                                <nav class="main-menu navbar-expand-md navbar-light">
                                    <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                        <ul class="navigation clearfix">
                                            <li class="logo-box" style="margin: 10px 10px">
                                                <figure class="logo" style="max-width: 200px;"><a href="<?= Url::toRoute(['site/index']) ?>"><img src="logo/logo_pkk4.png" alt=""></a></figure>
                                            </li>
                                            <li class="current"><a style="font-size:14px;" href="<?= Url::toRoute(['site/index']) ?>" >BERANDA</a>
                                            </li>
                                            <li class="dropdown" ><a href="#" style="font-size:14px;">PROFIL</a>
                                                <ul>
                                                    <li><a href="<?= Url::toRoute(['sejarah/index-sejarah']) ?>">SEJARAH PKK</a></li>
                                                    <li><a href="<?= Url::toRoute(['program/index-program']) ?>">10 PROGRAM POKOK PKK</a></li>
                                                    <li><a href="<?= Url::toRoute(['arti-lambang/index-arti-lambang']) ?>">ARTI LAMBANG PKK</a></li>
                                                    <li><a href="<?= Url::toRoute(['visi/index-visi-misi']) ?>">VISI & MISI</a></li>
                                                    <li><a href="<?= Url::toRoute(['bagan-mekanisme/index-bagan-mekanisme']) ?>">BAGAN MEKANISME GERAKAN PKK</a></li>
                                                    <li><a href="<?= Url::toRoute(['struktur-organisasi/index-struktur']) ?>">BAGAN STRUKTUR TP PKK KAB. TOBA</a></li>
                                                    <li><a href="<?= Url::toRoute(['pengurus-sekretariat/index-pengurus']) ?>">SUSUNAN PENGURUS TP PKK KAB. TOBA</a></li>
                                                    <li class="dropdown"><a href="#">PROFIL PEMBINA & KETUA TP PKK</a>
                                                        <ul>
                                                            <li><a href="<?= Url::toRoute(['profil-pembina/index-pembina']) ?>">PROFIL PEMBINA TP PKK</a></li>
                                                            <li><a href="<?= Url::toRoute(['profil-ketua/index-ketua']) ?>">PROFIL KETUA TP PKK</a></li>
                                                            <li><a href="<?= Url::toRoute(['sejarah-ketua/index-sejarah-ketua']) ?>">PROFIL KETUA PKK DARI MASA KE MASA</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="<?= Url::toRoute(['prestasi/index-prestasi']) ?>">PRESTASI</a></li>
                                                    <li><a href="<?= Url::toRoute(['mars/index-mars']) ?>">MARS PKK</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown"><a href="#" style="font-size:14px;">POKJA & SEKRETARIAT</a>
                                                <ul>
                                                    <li class="dropdown"><a href="#">SEKRETARIAT</a>
                                                        <ul>
                                                            <li><a href="<?= Url::toRoute(['pokja-sekretariat/index-program-pokjasekre', 'id_jenis_pokja' => 1]) ?>">PROGRAM SEKRETARIAT</a></li>
                                                            <li><a href="<?= Url::toRoute(['pokja-sekretariat/index-data-pokjasekre', 'id_jenis_pokja' => 1]) ?>">DATA UMUM SEKRETARIAT</a></li>
                                                        </ul>

                                                    </li>
                                                    <li class="dropdown"><a href="#">KELOMPOK KERJA (POKJA) I</a>
                                                        <ul>
                                                            <li><a href="<?= Url::toRoute(['pokja-sekretariat/index-program-pokjasekre', 'id_jenis_pokja' => 2]) ?>">PROGRAM POKJA I</a></li>
                                                            <li><a href="<?= Url::toRoute(['pokja-sekretariat/index-data-pokjasekre', 'id_jenis_pokja' => 2]) ?>">PAPAN DATA POKJA I</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="dropdown"><a href="#">KELOMPOK KERJA (POKJA) II</a>
                                                        <ul>
                                                            <li><a href="<?= Url::toRoute(['pokja-sekretariat/index-program-pokjasekre', 'id_jenis_pokja' => 3]) ?>">PROGRAM POKJA II</a></li>
                                                            <li><a href="<?= Url::toRoute(['pokja-sekretariat/index-data-pokjasekre', 'id_jenis_pokja' => 3]) ?>">PAPAN DATA POKJA II</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="dropdown"><a href="#">KELOMPOK KERJA (POKJA) III</a>
                                                        <ul>
                                                            <li><a href="<?= Url::toRoute(['pokja-sekretariat/index-program-pokjasekre', 'id_jenis_pokja' => 4]) ?>">PROGRAM POKJA III</a></li>
                                                            <li><a href="<?= Url::toRoute(['pokja-sekretariat/index-data-pokjasekre', 'id_jenis_pokja' => 4]) ?>">PAPAN DATA POKJA III</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="dropdown"><a href="#">KELOMPOK KERJA (POKJA) IV</a>
                                                        <ul>
                                                            <li><a href="<?= Url::toRoute(['pokja-sekretariat/index-program-pokjasekre', 'id_jenis_pokja' => 5]) ?>">PROGRAM POKJA IV</a></li>
                                                            <li><a href="<?= Url::toRoute(['pokja-sekretariat/index-data-pokjasekre', 'id_jenis_pokja' => 5]) ?>">PAPAN DATA POKJA IV</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="dropdown"><a href="#" style="font-size:14px;">INFORMASI</a>
                                                <ul>
                                                    <li class="dropdown"><a href="#">BERITA</a>
                                                        <ul>
                                                            <li><a href="<?= Url::toRoute(['berita/index-bertikel1', 'id_kategori' => 1]) ?>">TP PKK KABUPATEN</a>
                                                            </li>
                                                            <li><a href="<?= Url::toRoute(['berita/list-berita', 'id_kategori' => 2]) ?>">TP PKK KECAMATAN</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="<?= Url::toRoute(['pengumuman/index-pengumuman']) ?>">PENGUMUMAN</a></li>
                                                    <li><a href="<?= Url::toRoute(['event/index-event']) ?>">AGENDA KEGIATAN</a>
                                                    <li class="dropdown"><a href="#">GALERI</a>
                                                        <ul>
                                                            <li><a href="<?= Url::toRoute(['galeri-foto/index-galeri']) ?>">GALERI FOTO</a></li>
                                                            <li><a href="<?= Url::toRoute(['galeri-video/index-galeri']) ?>">GALERI VIDEO</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="<?= Url::toRoute(['kontak/index-kontak']) ?>">KONTAK KAMI</a>
                                                </ul>
                                            </li>
                                            <li class="dropdown"><a href="#" style="font-size:14px;">PUBLIKASI</a>
                                                <ul>
                                                    <li><a href="<?= Url::toRoute(['produk-hukum/index-produk-hukum']) ?>">PRODUK HUKUM</a>
                                                    </li>
                                                    <li><a href="<?= Url::toRoute(['file-download/index-download']) ?>">PEDOMAN DAN JUKNIS</a>
                                                    </li>
                                                </ul>
                                            </li>

                                        </li>

                                        <?php
                                            if (Yii::$app->user->isGuest) {
                                                ?>
                                            <li><a href="<?= Url::toRoute(['site/login']) ?>" style="font-size:14px;">MASUK</a></li>
                                            <?php
                                            } else {
                                                    ?>
                                                <li><a href="<?= Url::toRoute(['site/index-backend']) ?>" style="font-size:14px;">ADMIN</a></li>
                                                <?php
                                                }
                                                ?>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <!--sticky Header-->
                <div class="sticky-header" >
                    <div class="outer-box" style="justify-content: normal;" >
                        <li class="logo-box" style="margin: 10px 10px">
                            <figure class="logo" style="max-width: 200px;"><a href="<?= Url::toRoute(['site/index']) ?>"><img src="logo/logo_pkk.png" alt=""></a></figure>
                        </li>
                        <div class="menu-area">
                            <nav class="main-menu clearfix">
                                <!--Keep This Empty / Menu will come through Javascript-->
                            </nav>
                        </div>
                    </div>
                </div>
            </header>
            <!-- main-header end -->

            <!-- Mobile Menu  -->
            <div class="mobile-menu">
                <div class="menu-backdrop"></div>
                <div class="close-btn"><i class="fas fa-times"></i></div>

                <nav class="menu-box">
                    <div class="nav-logo"><a href="<?= Url::toRoute(['site/index']) ?>"><img src="logo/logo_pkk2.png" alt="" title=""></a></div>
                    <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
                </nav>
            </div><!-- End Mobile Menu -->


            <?= $content ?>


            <!-- main-footer -->
            <footer class="main-footer" style="background-image: url(bagery/assets/images/background/footer-1.jpg);">
                <div class="auto-container">
                    <div class="footer-top">
                        <div class="widget-section">
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                                    <div class="footer-widget logo-widget">
                                        <figure class="footer-logo"><a href="<?= Url::toRoute(['site/index']) ?>"><img src="logo/logo_pkk.png" alt=""></a></figure>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                                    <div class="footer-widget contact-widget">
                                        <div class="widget-title">
                                            <h3>HUBUNGI KAMI</h3>
                                        </div>
                                        <div class="widget-content">
                                            <ul class="info-list clearfix">
                                                <li class="fa fa-map-marker">
                                                    &nbsp<?= $kontak['alamat']; ?>
                                                </li>
                                                <li class="fa fa-envelope"> <a href="mailto:<?= $kontak['email']; ?>">
                                                        &nbsp <?= $kontak['email']; ?></a>
                                                </li>
                                                <li class="fa fa-phone-square"> <a href="tel:<?= $kontak['telepon']; ?> ">
                                                        &nbsp <?= $kontak['telepon']; ?> </a></li>
                                            </ul>
                                            <ul class="social-links clearfix">
                                                <li><a href="<?= $kontak['facebook']; ?>"><i class="fab fa-facebook-f"></i> </a></li>
                                                <li><a href="<?= $kontak['twitter']; ?>"><i class="fab fa-instagram"></i></a></li>
                                                <li><a href="<?= $kontak['instagram']; ?>"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="<?= $kontak['youtube']; ?>"><i class="fab fa-youtube"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                                    <div class="footer-widget contact-widget">
                                        <div class="widget-title">
                                            <h3>PROFIL</h3>
                                        </div>
                                        <div class="widget-content">
                                            <ul class="info-list clearfix ">
                                                <li><a href="<?= Url::toRoute(['visi/index-visi-misi']) ?>"><i class="fas fa-angle-right"></i> Visi & Misi</a></li>
                                                <li><a href="<?= Url::toRoute(['struktur-organisasi/index-struktur']) ?>"><i class="fas fa-angle-right"></i> Struktur Organisasi</a></li>
                                                <li></li>
                                                <li></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 footer-column">
                                    <div class="footer-widget links-widget">
                                        <div class="widget-title">
                                            <h3>QUICK LINKS</h3>
                                        </div>
                                        <div class="widget-content">
                                            <ul class="links-list clearfix">
                                                <li><a href="<?= Url::toRoute(['berita/index-bertikel', 'id_kategori' => 1]) ?>"><i class="fas fa-angle-right"></i>Berita</a></li>
                                                <li><a href="<?= Url::toRoute(['berita/index-bertikel', 'id_kategori' => 2]) ?>"><i class="fas fa-angle-right"></i>Artikel</a></li>
                                                <li><a href="<?= Url::toRoute(['event/index-event']) ?>"><i class="fas fa-angle-right"></i>Event</a></li>
                                                <li><a href="<?= Url::toRoute(['galeri-foto/index-galeri']) ?>"><i class="fas fa-angle-right"></i>Galeri Foto</a></li>
                                                <li><a href="<?= Url::toRoute(['galeri-video/index-galeri']) ?>"><i class="fas fa-angle-right"></i>Galeri Video</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="auto-container clearfix">
                        <div class="copyright pull-left">
                            <p>Developed by <a href="https://diskominfo.tobakab.go.id/" target="_blank">Kominfo Toba</a></p>
                        </div>
                        <ul class="footer-nav pull-right">
                            <p>Copyright © 2021 TIM PENGGERAK PKK <a href="https://tobakab.go.id/" target="_blank">KABUPATEN TOBA</a>. All rights reserved</p>
                        </ul>
                    </div>
                </div>
            </footer>
            <!-- main-footer end -->


            <!--Scroll to top-->
            <button class="scroll-top scroll-to-target" data-target="html">
                <span class="icon-Arrow-Up"></span>
            </button>
        </div>


        <!-- jequery plugins -->
        <script src="bagery/assets/js/jquery.js"></script>
        <script src="bagery/assets/js/popper.min.js"></script>
        <script src="bagery/assets/js/bootstrap.min.js"></script>
        <script src="bagery/assets/js/owl.js"></script>
        <script src="bagery/assets/js/wow.js"></script>
        <script src="bagery/assets/js/validation.js"></script>
        <script src="bagery/assets/js/jquery.fancybox.js"></script>
        <script src="bagery/assets/js/appear.js"></script>
        <script src="bagery/assets/js/jquery.countTo.js"></script>
        <script src="bagery/assets/js/scrollbar.js"></script>
        <script src="bagery/assets/js/isotope.js"></script>
        <script src="bagery/assets/js/jquery.nice-select.min.js"></script>
        <script src="bagery/assets/js/nav-tool.js"></script>

        <!-- main-js -->
        <script src="bagery/assets/js/script.js"></script>

    </body><!-- End of .page_wrapper -->

    <!-- Mirrored from azim.commonsupport.com/Bagery/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Jul 2021 04:58:35 GMT -->
</html>
