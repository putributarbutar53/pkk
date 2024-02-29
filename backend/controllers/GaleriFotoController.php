<?php

namespace backend\controllers;

use Yii;
use backend\models\GaleriFoto;
use backend\models\search\GaleriFotoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\GaleriFotoChild;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\base\Model;
/**
 * GaleriFotoController implements the CRUD actions for GaleriFoto model.
 */
class GaleriFotoController extends Controller
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
     * Lists all GaleriFoto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GaleriFotoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionIndexGaleri() {
        $this->layout = 'main-frontend';
        $searchModel = new GaleriFotoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index-galeri-foto', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    // public function actionIndexGaleriFoto() {
    //     $this->layout = 'main-frontend';
    //     $searchModel = new GaleriFotoSearch();
    //     $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    //     return $this->render('index-galeri-foto', [
    //                 'searchModel' => $searchModel,
    //                 'dataProvider' => $dataProvider,
    //     ]);
    // }

    /**
     * Displays a single GaleriFoto model.
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
    // public function actionViewGaleriFoto($id) {
    //     $this->layout = 'main-frontend';
    //     return $this->render('view-galeri-foto', [
    //                 'model' => $this->findModel($id),
    //     ]);
    // }

    /**
     * Creates a new GaleriFoto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GaleriFoto();
        $modelChild = new GaleriFotoChild();

        if ($model->load(Yii::$app->request->post()) && $modelChild->load(Yii::$app->request->post())) {
            //foto thumnail
            $foto = UploadedFile::getInstance($model, 'foto_thumbnail');
            $pathFoto = 'file/galeri/thumbnail/';
            FileHelper::createDirectory($pathFoto, $mode = 0777, $recursive = true);
            $pathFileFoto = '';
            if (isset($foto)) {
                $rand = rand();
                $foto->saveAs($pathFoto . $rand . '_galthum' . '.' . $foto->extension);
                $pathFileFoto = $pathFoto . $rand . '_galthum' . '.' . $foto->extension;
                $model->foto_thumbnail = $pathFileFoto;
            }
            //end foto thumbnail
            if ($model->save()) {
                //foto galeri child
                $fotoGalChild = UploadedFile::getInstances($modelChild, 'foto');
                $pathFotoGalChild = 'file/galeri/child/';
                FileHelper::createDirectory($pathFotoGalChild, $mode = 0777, $recursive = true);
                $pathFileFotoGalChild = '';
                if (isset($fotoGalChild)) {
                    foreach ($fotoGalChild as $fgc) {
                        $modelChild = new GaleriFotoChild();
                        $rand = rand();
                        $fgc->saveAs($pathFotoGalChild . $rand . '_galchild' . '.' . $fgc->extension);
                        $pathFileFotoGalChild = $pathFotoGalChild . $rand . '_galchild' . '.' . $fgc->extension;
                        $modelChild->foto = $pathFileFotoGalChild;
                        $modelChild->id_galeri_foto = $model->id;
                        $modelChild->save(false);
                    }
                }
                //end foto galeri child
            Yii::$app->session->setFlash('success', "Galeri Foto Berhasil Di Buat");
                return $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('danger', "Galeri Foto Gagal Di Buat");
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
                    'modelChild' => $modelChild
        ]);
    }

    /**
     * Updates an existing GaleriFoto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing GaleriFoto model.
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
     * Finds the GaleriFoto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GaleriFoto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GaleriFoto::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
