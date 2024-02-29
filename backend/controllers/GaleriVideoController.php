<?php

namespace backend\controllers;

use Yii;
use backend\models\GaleriVideo;
use backend\models\search\GaleriVideoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * GaleriVideoController implements the CRUD actions for GaleriVideo model.
 */
class GaleriVideoController extends Controller
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
     * Lists all GaleriVideo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GaleriVideoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexGaleri() {
        $this->layout = 'main-frontend';
        $searchModel = new GaleriVideoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index-galeri-video', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GaleriVideo model.
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
     * Creates a new GaleriVideo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GaleriVideo();

        if ($model->load(Yii::$app->request->post())) {
            
            $file = UploadedFile::getInstance($model, 'foto_thumbnail');
            $path = 'foto_thumbnail/GaleriVideo/';
            FileHelper::createDirectory($path, $mode = 0775, $recursive = true);
            $pathFile = '';
            if (isset($file)) {
                $rand = rand();
                $file->saveAs($path . $rand . '_galleryvideo' . '.' . $file->extension);
                $pathFile = $path . $rand . '_galleryvideo' . '.' . $file->extension;
                $model->foto_thumbnail = $pathFile;
            }
            if ($model->save()) {
                Yii::$app->session->setFlash('success', "Galeri Video Berhasil Disimpan");
                return $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('danger', "Galeri Video Gagal Disimpan");
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing GaleriVideo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $pathFileOld = $model->foto_thumbnail;
        if ($model->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance($model, 'foto_thumbnail');
            $path = 'foto_thumbnail/GaleriVideo/';
            FileHelper::createDirectory($path, $mode = 0775, $recursive = true);
            $pathFile = '';
            if (isset($file)) {
                $rand = rand();
                $file->saveAs($path . $rand . '_galleryvideo' . '.' . $file->extension);
                $pathFile = $path . $rand . '_galleryvideo' . '.' . $file->extension;
                $model->foto_thumbnail = $pathFile;
            } else {
                $model->foto_thumbnail = $pathFileOld;
            }
            if ($model->save(false)) {
                Yii::$app->session->setFlash('success', "Galeri Video Berhasil Diubah");
                return $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('danger', "Galeri Video Gagal Diubah");
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing GaleriVideo model.
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
     * Finds the GaleriVideo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GaleriVideo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GaleriVideo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
