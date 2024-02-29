<?php

namespace backend\controllers;

use Yii;
use backend\models\Pengumuman;
use backend\models\search\PengumumanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * PengumumanController implements the CRUD actions for Pengumuman model.
 */
class PengumumanController extends Controller
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
     * Lists all Pengumuman models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PengumumanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexPengumuman() {
        $this->layout = 'main-frontend';
        $searchModel = new PengumumanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index-pengumuman', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pengumuman model.
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

    public function actionViewPengumuman($id) {
        $this->layout = 'main-frontend';
        return $this->render('view-pengumuman', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Pengumuman model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pengumuman();

        if ($model->load(Yii::$app->request->post())) {
            //foto berita
            $foto = UploadedFile::getInstance($model, 'thumbnail');
            $pathFoto = 'foto/pengumuman/';
            FileHelper::createDirectory($pathFoto, $mode = 0777, $recursive = true);
            $pathFileFoto = '';
            if (isset($foto)) {
                $rand = rand();
                $foto->saveAs($pathFoto . $rand . '_pengumuman' . '.' . $foto->extension);
                $pathFileFoto = $pathFoto . $rand . '_pengumuman' . '.' . $foto->extension;
                $model->thumbnail = $pathFileFoto;
            }
            //end foto berita

            if ($model->save(false)) {
                Yii::$app->session->setFlash('success', "Pengumuman Berhasil Disimpan");
            } else {
                Yii::$app->session->setFlash('danger', "Pengumuman Gagal Disimpan");
            }
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pengumuman model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $fileLama = $model->thumbnail;
        if ($model->load(Yii::$app->request->post())) {
            //foto berita
            $foto = UploadedFile::getInstance($model, 'thumbnail');
            if ($foto != null) {
                $pathFoto = 'foto/pengumuman/';
                FileHelper::createDirectory($pathFoto, $mode = 0777, $recursive = true);
                $pathFileFoto = '';
                if (isset($foto)) {
                    $rand = rand();
                    $foto->saveAs($pathFoto . $rand . '_pengumuman' . '.' . $foto->extension);
                    $pathFileFoto = $pathFoto . $rand . '_pengumuman' . '.' . $foto->extension;
                    $model->thumbnail = $pathFileFoto;
                }
            } else {
                $model->thumbnail = $fileLama;
            }

            //end foto berita
            if ($model->save(false)) {
                Yii::$app->session->setFlash('success', "Pengumuman Berhasil Diubah");
            } else {
                Yii::$app->session->setFlash('danger', "Pengumuman Gagal Diubah");
            }
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pengumuman model.
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
     * Finds the Pengumuman model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pengumuman the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pengumuman::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
