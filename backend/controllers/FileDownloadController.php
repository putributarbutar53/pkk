<?php

namespace backend\controllers;

use Yii;
use backend\models\FileDownload;
use backend\models\search\FileDownoadSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
/**
 * FileDownloadController implements the CRUD actions for FileDownload model.
 */
class FileDownloadController extends Controller
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
     * Lists all FileDownload models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FileDownoadSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexDownload() {
        $this->layout = 'main-frontend';
        $searchModel = new FileDownoadSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index-download', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FileDownload model.
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
     * Creates a new FileDownload model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
    $model = new FileDownload();
        if ($model->load(Yii::$app->request->post())) {

            $file = UploadedFile::getInstance($model, 'file');
            $path = 'file/FileDownload/';
            FileHelper::createDirectory($path, $mode = 0775, $recursive = true);
            $pathFile = '';
            if (isset($file)) {
                $rand = rand();
                $file->saveAs($path . $rand . '_file' . '.' . $file->extension);
                $pathFile = $path . $rand . '_file' . '.' . $file->extension;
                $model->file = $pathFile;
            }
            if ($model->save(false)) {
                Yii::$app->session->setFlash('success', "Pedoman dan Juknis Berhasil Disimpan");
                return $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('danger', "Pedoman dan Juknis Gagal Disimpan");
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing FileDownload model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $pathFileOld = $model->file;
        if ($model->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance($model, 'file');
            $path = 'file/FileDownload/';
            FileHelper::createDirectory($path, $mode = 0775, $recursive = true);
            $pathFile = '';
            if (isset($file)) {
                $rand = rand();
                $file->saveAs($path . $rand . '_file' . '.' . $file->extension);
                $pathFile = $path . $rand . '_file' . '.' . $file->extension;
                $model->file = $pathFile;
            } else {
                $model->file = $pathFileOld;
            }
            if ($model->save(false)) {
                Yii::$app->session->setFlash('success', "Pedoman dan Juknis Berhasil Diubah");
                return $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('danger', "Pedoman dan Juknis Gagal Diubah");
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing FileDownload model.
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
     * Finds the FileDownload model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FileDownload the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FileDownload::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
