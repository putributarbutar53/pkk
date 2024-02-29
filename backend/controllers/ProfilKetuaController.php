<?php

namespace backend\controllers;

use Yii;
use backend\models\ProfilKetua;
use backend\models\search\ProfilKetuaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * ProfilKetuaController implements the CRUD actions for ProfilKetua model.
 */
class ProfilKetuaController extends Controller
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
     * Lists all ProfilKetua models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProfilKetuaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexKetua() {
        $this->layout = 'main-frontend';
        $searchModel = new ProfilKetuaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index-ketua', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProfilKetua model.
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
     * Creates a new ProfilKetua model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProfilKetua();

        if ($model->load(Yii::$app->request->post())) {
            //foto berita
            $foto = UploadedFile::getInstance($model, 'foto');
            $pathFoto = 'foto/profile_ketua/';
            FileHelper::createDirectory($pathFoto, $mode = 0777, $recursive = true);
            $pathFileFoto = '';
            if (isset($foto)) {
                $rand = rand();
                $foto->saveAs($pathFoto . $rand . '_profileKetua' . '.' . $foto->extension);
                $pathFileFoto = $pathFoto . $rand . '_profileKetua' . '.' . $foto->extension;
                $model->foto = $pathFileFoto;
            }
            //end foto berita

            if ($model->save(false)) {
                Yii::$app->session->setFlash('success', "Profil Ketua Berhasil Disimpan");
            } else {
                Yii::$app->session->setFlash('danger', "Profil Ketua Gagal Disimpan");
            }
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProfilKetua model.
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
                $pathFoto = 'foto/profile_ketua/';
                FileHelper::createDirectory($pathFoto, $mode = 0777, $recursive = true);
                $pathFileFoto = '';
                if (isset($foto)) {
                    $rand = rand();
                    $foto->saveAs($pathFoto . $rand . '_profileKetua' . '.' . $foto->extension);
                    $pathFileFoto = $pathFoto . $rand . '_profileKetua' . '.' . $foto->extension;
                    $model->foto = $pathFileFoto;
                }
            } else {
                $model->foto = $fotoLama;
            }

            //end foto berita
            if ($model->save(false)) {
                Yii::$app->session->setFlash('success', "Profil Ketua Berhasil Diubah");
            } else {
                Yii::$app->session->setFlash('danger', "Profil Ketua Gagal Diubah");
            }
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProfilKetua model.
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
     * Finds the ProfilKetua model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProfilKetua the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProfilKetua::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
