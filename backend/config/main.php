<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'as access' => [
        'class' => '\hscstudio\mimin\components\AccessControl',
        'allowActions' => [
            // add wildcard allowed action here!
            'site/*',
            'debug/*',
            'mimin/*', // only in dev mode
            'visi/index-visi-misi',
            'sejarah/index-sejarah',
            'struktur-organisasi/index-struktur',
            'file-download/index-download',
            'kontak/index-kontak',
            'berita/index-bertikel',
            'berita/index-bertikel1',
            'berita/list-berita',
            'berita/view-bertikel',
            'event/index-event',
            'event/view-event',
            'galeri-foto/index-galeri',
            'galeri-video/index-galeri',
            'program/index-program',
            'arti-lambang/index-arti-lambang',
            'bagan-mekanisme/index-bagan-mekanisme',
            'pengurus-skretariat/index-pengurus',
            'profil-pembina/index-pembina',
            'profil-ketua/index-ketua',
            'sejarah-ketua/index-sejarah-ketua',
            'prestasi/index-prestasi',
            'mars/index-mars',
            'pokja-sekretariat/index-program-pokjasekre',
            'pokja-sekretariat/index-data-pokjasekre',
            'pengumuman/index-pengumuman',
            'pengumuman/view-pengumuman',
            'produk-hukum/index-produk-hukum',
            'pengurus-sekretariat/index-pengurus',
        ],
    ],
    'modules' => [
        'mimin' => [
        'class' => '\hscstudio\mimin\Module',
        ],
    ],
    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // only support DbManager
            ],
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];
