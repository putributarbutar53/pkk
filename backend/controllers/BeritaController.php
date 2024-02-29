<?php

namespace backend\controllers;

use Yii;
use backend\models\Berita;
use backend\models\search\BeritaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * BeritaController implements the CRUD actions for Berita model.
 */
class BeritaController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Berita models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BeritaSearch();
        $searchModel->id_penulis = Yii::$app->user->id;

        $queryParams = Yii::$app->request->queryParams;
        if (isset($queryParams['Berita']['id_penulis'])) {
            $queryParams['Berita']['id_penulis'] = Yii::$app->user->id;
        }

        $dataProvider = $searchModel->search($queryParams);
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }
    public function actionIndexKecamatan() {
        $searchModel = new BeritaSearch();
        $searchModel->id_penulis = Yii::$app->user->id;

        $queryParams = Yii::$app->request->queryParams;
        if (isset($queryParams['Berita']['id_penulis'])) {
            $queryParams['Berita']['id_penulis'] = Yii::$app->user->id;
        }

        $dataProvider = $searchModel->searchKecamatan($queryParams);
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexDiterima() {
        $searchModel = new BeritaSearch();
        $dataProvider = $searchModel->searchDiterima(Yii::$app->request->queryParams);
        return $this->render('index-direview', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexDireview() {
        $searchModel = new BeritaSearch();
        $dataProvider = $searchModel->searchDireview(Yii::$app->request->queryParams);
        return $this->render('index-direview', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }
    public function actionIndexDitolak() {
        $searchModel = new BeritaSearch();
        $dataProvider = $searchModel->searchDitolak(Yii::$app->request->queryParams);
        return $this->render('index-direview', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexMasuk() {
        $searchModel = new BeritaSearch();
//        $searchModel->created_by = Yii::$app->user->id;

        $dataProvider = $searchModel->searchMasuk(Yii::$app->request->queryParams);
        return $this->render('index-masuk', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTolak($id) {
        $model = Berita::findOne($id);
        $model->id_master_status = 3;
        $model->id_penulis = $model->created_by;
        if ($model->save()) {
            Yii::$app->session->setFlash('success', "Berita Berhasil Ditolak");
            return $this->redirect(['index-masuk']);
        }
    }
    public function actionTerima($id) {
        $model = Berita::findOne($id);
        $model->id_master_status = 1;
        $model->id_penulis = $model->created_by;
        if ($model->save()) {
            Yii::$app->session->setFlash('success', "Berita Berhasil Diterima");
            return $this->redirect(['index-masuk']);
        }
    }

    public function actionIndexBertikel($id_penulis) {
        $this->layout = 'main-frontend';
        $searchModel = new BeritaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index-bertikel', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'id_penulis' => $id_penulis,
        ]);
    }
    public function actionIndexBertikel1($id_kategori) {
        $this->layout = 'main-frontend';
        $searchModel = new BeritaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index-bertikel1', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'id_kategori' => $id_kategori,
        ]);
    }

    public function actionListBerita($id_kategori) {
        $this->layout = 'main-frontend';
        $searchModel = new BeritaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('list-berita', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'id_kategori' => $id_kategori,
        ]);
    }

    /**
     * Displays a single Berita model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    public function actionViewReview($id) {
        return $this->render('view-review', [
                    'model' => $this->findModel($id),
        ]);
    }

    public function actionViewBertikel($id) {
        $this->layout = 'main-frontend';
        return $this->render('view-bertikel', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Berita model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Berita();

        if ($model->load(Yii::$app->request->post())) {
            //foto berita
            $foto = UploadedFile::getInstance($model, 'foto');
            $pathFoto = 'foto/berita/';
            FileHelper::createDirectory($pathFoto, $mode = 0777, $recursive = true);
            $pathFileFoto = '';
            if (isset($foto)) {
                $rand = rand();
                $foto->saveAs($pathFoto . $rand . '_berita' . '.' . $foto->extension);
                $pathFileFoto = $pathFoto . $rand . '_berita' . '.' . $foto->extension;
                $model->foto = $pathFileFoto;
            }
            //end foto berita
            //file berita
            $file = UploadedFile::getInstance($model, 'file');
            $path = 'file/berita/';
            FileHelper::createDirectory($path, $mode = 0777, $recursive = true);
            $pathFile = '';
            if (isset($file)) {
                $rand = rand();
                $file->saveAs($path . $rand . '_berita' . '.' . $file->extension);
                $pathFile = $path . $rand . '_berita' . '.' . $file->extension;
                $model->file = $pathFile;
            }
            //end file berita
            $model->jumlah_view = 0;
            $model->id_penulis = \Yii::$app->user->identity->id;
            if (\Yii::$app->user->identity->username == 'admin') {
                $model->id_kategori = 1; //Kabupaten
                $model->id_master_status = 1; //Publish
                if ($model->save()) {
                    Yii::$app->session->setFlash('success', "Berita Berhasil Di Tambahkan");
                    return $this->redirect(['index']);
                } else {
                    Yii::$app->session->setFlash('danger', "Berita Gagal Di Tambahkan");
                    return $this->redirect(['index']);
                }
            } else {
                $model->id_kategori = 2; //Kecamatan
                $model->id_master_status = 2; //Draft
                if ($model->save()) {
                    Yii::$app->session->setFlash('success', "Berita Sedang Direview Oleh Admin Kabupaten");
                    return $this->redirect(['index-direview']);
                } else {
                    Yii::$app->session->setFlash('danger', "Berita Gagal Di Tambahkan");
                    return $this->redirect(['index-direview']);
                }
            }
            
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Berita model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelx = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $foto = UploadedFile::getInstance($model, 'foto');
            if (!empty($foto)) {
                $path = 'foto/berita/';
                FileHelper::createDirectory($path, $mode = 0775, $recursive = true);
                $pathFile = '';
                if (isset($foto)) {
                    $rand = rand();
                    $foto->saveAs($path . $rand . '_berita' . '.' . $foto->extension);
                    $pathFile = $path . $rand . '_berita' . '.' . $foto->extension;
                    $model->foto = $pathFile;
                }
            } else {
                $model->foto = $modelx->foto;
            }
            $file = UploadedFile::getInstance($model, 'file');
            if (!empty($file)) {
                $path = 'file/berita/';
                FileHelper::createDirectory($path, $mode = 0775, $recursive = true);
                $pathFile = '';
                if (isset($file)) {
                    $rand = rand();
                    $file->saveAs($path . $rand . '_berita' . '.' . $file->extension);
                    $pathFile = $path . $rand . '_berita' . '.' . $file->extension;
                    $model->file = $pathFile;
                }
            } else {
                $model->file = $modelx->file;
            }
            if ($model->save()) {
                Yii::$app->session->setFlash('success', "Berita Berhasil Di Update");
                return $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('danger', "Berita Gagal Di Update");
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    // public function actionUpdate($id)
    // {
    //     $model = $this->findModel($id);

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id' => $model->id]);
    //         $model->id_user = Yii::$app->user->identity->id;
    //         $file = UploadedFile::getInstance($model, 'file');
    //         $file2 = UploadedFile::getInstance($model, 'foto');
    //         $path = 'foto/Berita/';
    //         $path2 = 'file/Berita/';
    //         FileHelper::createDirectory($path, $mode = 0775, $recursive = true);
    //         FileHelper::createDirectory($path, $mode = 0776, $recursive = true);
    //         $pathFile = '';
    //         if (isset($file)) {
    //             $rand = rand();
    //             $file->saveAs($path . $rand . '_event' . '.' . $file->extension);
    //             $file2->saveAs($path2 . $rand . '_event' . '.' . $file2->extension);
    //             $pathFile = $path . $rand . '_event' . '.' . $file->extension;
    //             $pathFile2 = $path2 . $rand . '_event' . '.' . $file2->extension;
    //             $model->foto = $pathFile;
    //             $model->file = $pathFile2;
    //         } else {
    //             $model->file = $pathFileOld;
    //         }
    //         $model->save();
    //         return $this->redirect(['index']);
    //     }

    //     return $this->render('update', [
    //         'model' => $model,
    //     ]);
    // }


    /**
     * Deletes an existing Berita model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Berita model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Berita the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Berita::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
