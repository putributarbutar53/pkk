<?php

namespace backend\controllers;

use Yii;
use backend\models\SejarahKetua;
use backend\models\search\SejarahKetuaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * SejarahKetuaController implements the CRUD actions for SejarahKetua model.
 */
class SejarahKetuaController extends Controller
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
     * Lists all SejarahKetua models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SejarahKetuaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexSejarahKetua() {
        $this->layout = 'main-frontend';
        $searchModel = new SejarahKetuaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index-sejarah-ketua', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SejarahKetua model.
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

    /**
     * Creates a new SejarahKetua model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SejarahKetua();

        if ($model->load(Yii::$app->request->post())) {
            //foto berita
            $foto = UploadedFile::getInstance($model, 'foto');
            $pathFoto = 'foto/sejarah_ketua/';
            FileHelper::createDirectory($pathFoto, $mode = 0777, $recursive = true);
            $pathFileFoto = '';
            if (isset($foto)) {
                $rand = rand();
                $foto->saveAs($pathFoto . $rand . '_sejarahKetua' . '.' . $foto->extension);
                $pathFileFoto = $pathFoto . $rand . '_sejarahKetua' . '.' . $foto->extension;
                $model->foto = $pathFileFoto;
            }
            //end foto berita
            $mulai = $model->mulai . '-01-01';
            $selesai = $model->selesai . '-01-01';
            $model->mulai = date("Y-m-d", strtotime($mulai));
            $model->selesai = date("Y-m-d", strtotime($selesai));
            if ($model->save(false)) {
                Yii::$app->session->setFlash('success', "Sejarah Ketua Berhasil Disimpan");
            } else {
                Yii::$app->session->setFlash('danger', "Sejarah Ketua Gagal Disimpan");
            }
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SejarahKetua model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $fotoLama = $model->foto;
        if ($model->load(Yii::$app->request->post())) {
            //foto berita
            $foto = UploadedFile::getInstance($model, 'foto');
            if ($foto != null) {
                $pathFoto = 'foto/sejarah_ketua/';
                FileHelper::createDirectory($pathFoto, $mode = 0777, $recursive = true);
                $pathFileFoto = '';
                if (isset($foto)) {
                    $rand = rand();
                    $foto->saveAs($pathFoto . $rand . '_sejarahKetua' . '.' . $foto->extension);
                    $pathFileFoto = $pathFoto . $rand . '_sejarahKetua' . '.' . $foto->extension;
                    $model->foto = $pathFileFoto;
                }
            } else {
                $model->foto = $fotoLama;
            }

            //end foto berita
            $mulai = $model->mulai . '-01-01';
            $selesai = $model->selesai . '-01-01';
            $model->mulai = date("Y-m-d", strtotime($mulai));
            $model->selesai = date("Y-m-d", strtotime($selesai));
            if ($model->save(false)) {
                Yii::$app->session->setFlash('success', "Sejarah Ketua Berhasil Disimpan");
            } else {
                Yii::$app->session->setFlash('danger', "Sejarah Ketua Gagal Disimpan");
            }
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SejarahKetua model.
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
     * Finds the SejarahKetua model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SejarahKetua the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SejarahKetua::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
