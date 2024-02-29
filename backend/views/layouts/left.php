<?php

use hscstudio\mimin\components\Mimin;

$username = \Yii::$app->user->identity->username;
?>

<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>
                    <?= $username ?>
                </p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                ['label' => 'Kembali ke Website', 'icon' => 'file-code-o', 'url' => ['/site/index']],
                [
                    'label' => 'Profil',
                    'icon' => 'share',
                    'url' => '#',
//                    'visible' => Mimin::checkRoute('/mimin/*', true),
                    'items' => [
                        ['label' => 'Slider', 'icon' => 'file-code-o', 'visible' => Mimin::checkRoute('/slider/index', true), 'url' => ['/slider/index']],
                        ['label' => 'Sejarah', 'icon' => 'file-code-o', 'visible' => Mimin::checkRoute('/sejarah/index', true), 'url' => ['/sejarah/index']],
                        ['label' => 'Program Pokok', 'icon' => 'file-code-o', 'visible' => Mimin::checkRoute('/program/index', true), 'url' => ['/program/index']],
                        ['label' => 'Arti Lambang', 'icon' => 'file-code-o', 'visible' => Mimin::checkRoute('/arti-lambang/index', true), 'url' => ['/arti-lambang/index']],
                        ['label' => 'Misi', 'icon' => 'file-code-o', 'visible' => Mimin::checkRoute('/misi/index', true), 'url' => ['/misi/index']],
                        ['label' => 'Visi', 'icon' => 'file-code-o', 'visible' => Mimin::checkRoute('/visi/index', true), 'url' => ['/visi/index']],
                        ['label' => 'Bagan Mekanisme', 'icon' => 'file-code-o', 'visible' => Mimin::checkRoute('/bagan-mekanisme/index', true), 'url' => ['/bagan-mekanisme/index']],
                        ['label' => 'Struktur Organisasi', 'icon' => 'file-code-o', 'visible' => Mimin::checkRoute('/struktur-organisasi/index', true), 'url' => ['/struktur-organisasi/index']],
                        ['label' => 'Pengurus Sekretariat', 'icon' => 'file-code-o', 'visible' => Mimin::checkRoute('/pengurus-sekretariat/index', true), 'url' => ['/pengurus-sekretariat/index']],
//                        ['label' => 'Jenis Pokja', 'icon' => 'file-code-o', 'visible' => Mimin::checkRoute('/jenis-pokja/index', true), 'url' => ['/jenis-pokja/index']],
                        ['label' => 'Pengurus Pokja', 'icon' => 'file-code-o', 'visible' => Mimin::checkRoute('/pengurus-pokja/index', true), 'url' => ['/pengurus-pokja/index']],
                        ['label' => 'Anggota Pokja', 'icon' => 'file-code-o', 'visible' => Mimin::checkRoute('/anggota-pokja/index', true), 'url' => ['/anggota-pokja/index']],
                        ['label' => 'Pokja dan Sekretariat', 'icon' => 'file-code-o', 'visible' => Mimin::checkRoute('/pokja-sekretariat/index', true), 'url' => ['/pokja-sekretariat/index']],
                        ['label' => 'Profil Pembina', 'icon' => 'file-code-o', 'visible' => Mimin::checkRoute('/profil-pembina/index', true), 'url' => ['/profil-pembina/index']],
                        ['label' => 'Profil Ketua', 'icon' => 'file-code-o', 'visible' => Mimin::checkRoute('/profil-ketua/index', true), 'url' => ['/profil-ketua/index']],
                        ['label' => 'Sejarah Ketua', 'icon' => 'file-code-o', 'visible' => Mimin::checkRoute('/sejarah-ketua/index', true), 'url' => ['/sejarah-ketua/index']],
                            ['label' => 'Prestasi', 'icon' => 'file-code-o', 'visible' => Mimin::checkRoute('/prestasi/index', true), 'url' => ['/prestasi/index']],
                        ['label' => 'Mars', 'icon' => 'file-code-o', 'visible' => Mimin::checkRoute('/mars/index', true), 'url' => ['/mars/index']],
                    ],
                ],
                [
                    'label' => 'Informasi Publik',
                    'icon' => 'share',
                    'url' => '#',
//                    'visible' => Mimin::checkRoute('/mimin/*', true),
                    'items' => [
                        ['label' => 'Berita Kabupaten', 'icon' => 'file-code-o', 'visible' => Mimin::checkRoute('/berita/index', true), 'url' => ['/berita/index']],
                            ['label' => 'Berita Kecamatan', 'icon' => 'file-code-o', 'visible' => Mimin::checkRoute('/berita/index-kecamatan', true), 'url' => ['/berita/index-kecamatan']],
                            ['label' => 'Pengumuman', 'icon' => 'file-code-o', 'visible' => Mimin::checkRoute('/pengumuman/index', true), 'url' => ['/pengumuman/index']],
                            ['label' => 'Event', 'icon' => 'file-code-o', 'visible' => Mimin::checkRoute('/event/index', true), 'url' => ['/event/index']],
                        ['label' => 'Galeri Foto', 'icon' => 'file-code-o', 'visible' => Mimin::checkRoute('/galeri-foto/index', true), 'url' => ['/galeri-foto/index']],
                        ['label' => 'Galeri Video', 'icon' => 'file-code-o', 'visible' => Mimin::checkRoute('/galeri-video/index', true), 'url' => ['/galeri-video/index']],
                        ['label' => 'Kontak', 'icon' => 'file-code-o', 'visible' => Mimin::checkRoute('/kontak/index', true), 'url' => ['/kontak/index']],
                        ['label' => 'Hubungi Kami', 'icon' => 'file-code-o', 'visible' => Mimin::checkRoute('/hubungi-kami/index', true), 'url' => ['/hubungi-kami/index']],
                    ],
                ],
                [
                    'label' => 'Berita Review',
                    'icon' => 'share',
                    'url' => '#',
                    'visible' => Mimin::checkRoute('/berita/index-masuk', true),
                    'items' => [
                            ['label' => 'Berita Kecamatan', 'icon' => 'file-code-o', 'visible' => Mimin::checkRoute('/berita/index-masuk', true), 'url' => ['/berita/index-masuk']],
                    ],
                ],
                    [
                    'label' => 'Berita',
                    'icon' => 'share',
                    'url' => '#',
                    'visible' => Mimin::checkRoute('/berita/index-direview', true),
                    'items' => [
                            ['label' => 'Tambah Berita', 'icon' => 'file-code-o', 'visible' => Mimin::checkRoute('/berita/create', true), 'url' => ['/berita/create']],
                            ['label' => 'Berita Diterima', 'icon' => 'file-code-o', 'visible' => Mimin::checkRoute('/berita/index-diterima', true), 'url' => ['/berita/index-diterima']],
                            ['label' => 'Berita Direview', 'icon' => 'file-code-o', 'visible' => Mimin::checkRoute('/berita/index-direview', true), 'url' => ['/berita/index-direview']],
                            ['label' => 'Berita Ditolak', 'icon' => 'file-code-o', 'visible' => Mimin::checkRoute('/berita/index-ditolak', true), 'url' => ['/berita/index-ditolak']],
                    ],
                ],
                    [
                    'label' => 'Publikasi',
                    'icon' => 'share',
                    'url' => '#',
//                    'visible' => Mimin::checkRoute('/mimin/*', true),
                    'items' => [
                        ['label' => 'Produk Hukum', 'icon' => 'file-code-o', 'visible' => Mimin::checkRoute('/produk-hukum/index', true), 'url' => ['/produk-hukum/index']],
                        ['label' => 'Pedoman dan Juknis', 'icon' => 'file-code-o', 'visible' => Mimin::checkRoute('/file-download/index', true), 'url' => ['/file-download/index']],
                    ],
                ],
//                ['label' => 'Master Kategori', 'icon' => 'file-code-o', 'visible' => Mimin::checkRoute('/master-kategori/index', true), 'url' => ['/master-kategori/index']],
//                ['label' => 'Master Status', 'icon' => 'file-code-o', 'visible' => Mimin::checkRoute('/master-status/index', true), 'url' => ['/master-status/index']],
                ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                    'label' => 'Super Admin',
                    'icon' => 'share',
                    'url' => '#',
                    'visible' => Mimin::checkRoute('/mimin/', true),
//                    'visible' => Mimin::checkRoute('/mimin/*', true),
                    'items' => [
                        ['label' => 'Route', 'icon' => 'file-code-o', 'url' => ['/mimin/route']],
                        ['label' => 'Role', 'icon' => 'file-code-o', 'url' => ['/mimin/role']],
                        ['label' => 'User', 'icon' => 'file-code-o', 'url' => ['/mimin/user']],
                    ],
                ],
//                ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                ['label' => 'Gii', 'icon' => 'file-code-o', 'visible' => Mimin::checkRoute('/gii', true), 'url' => ['/gii']],
                ['label' => 'Debug', 'icon' => 'dashboard', 'visible' => Mimin::checkRoute('/debug', true), 'url' => ['/debug']],
                ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
            ],
            ]
        ) ?>

    </section>

</aside>
