<?php

namespace backend\controllers;

use Yii;
use backend\models\ProdukHukum;
use backend\models\search\ProdukHukumSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * ProdukHukumController implements the CRUD actions for ProdukHukum model.
 */
class ProdukHukumController extends Controller
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
     * Lists all ProdukHukum models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProdukHukumSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexProdukHukum() {
        $this->layout = 'main-frontend';
        $searchModel = new ProdukHukumSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index-produk-hukum', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProdukHukum model.
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
     * Creates a new ProdukHukum model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProdukHukum();

        if ($model->load(Yii::$app->request->post())) {
            //file berita
            $file = UploadedFile::getInstance($model, 'file');
            $path = 'file/produk_hukum/';
            FileHelper::createDirectory($path, $mode = 0777, $recursive = true);
            $pathFile = '';
            if (isset($file)) {
                $rand = rand();
                $file->saveAs($path . $rand . '_produkHukum' . '.' . $file->extension);
                $pathFile = $path . $rand . '_produkHukum' . '.' . $file->extension;
                $model->file = $pathFile;
            }
            //end file berita

            if ($model->save(false)) {
                Yii::$app->session->setFlash('success', "Produk Hukum Berhasil Disimpan");
            } else {
                Yii::$app->session->setFlash('danger', "Produk Hukum Gagal Disimpan");
            }
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProdukHukum model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $fileLama = $model->file;
        if ($model->load(Yii::$app->request->post())) {
            //file berita
            $file = UploadedFile::getInstance($model, 'file');
            if ($file != null) {
                $path = 'file/produk_hukum/';
                FileHelper::createDirectory($path, $mode = 0777, $recursive = true);
                $pathFile = '';
                if (isset($file)) {
                    $rand = rand();
                    $file->saveAs($path . $rand . '_produkHukum' . '.' . $file->extension);
                    $pathFile = $path . $rand . '_produkHukum' . '.' . $file->extension;
                    $model->file = $pathFile;
                }
            } else {
                $model->file = $fileLama;
            }

            //end file berita

            if ($model->save(false)) {
                Yii::$app->session->setFlash('success', "Produk Hukum Berhasil Disimpan");
            } else {
                Yii::$app->session->setFlash('danger', "Produk Hukum Gagal Disimpan");
            }
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProdukHukum model.
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
     * Finds the ProdukHukum model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProdukHukum the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProdukHukum::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
