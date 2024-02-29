<?php

namespace backend\controllers;

use Yii;
use backend\models\BaganMekanisme;
use backend\models\search\BaganMekanismeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * BaganMekanismeController implements the CRUD actions for BaganMekanisme model.
 */
class BaganMekanismeController extends Controller
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
     * Lists all BaganMekanisme models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BaganMekanismeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexBaganMekanisme() {
        $this->layout = 'main-frontend';
        $searchModel = new BaganMekanismeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index-bagan-mekanisme', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BaganMekanisme model.
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
     * Creates a new BaganMekanisme model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BaganMekanisme();

        if ($model->load(Yii::$app->request->post())) {

            $file = UploadedFile::getInstance($model, 'foto');
            $path = 'foto/bagan/';
            FileHelper::createDirectory($path, $mode = 0775, $recursive = true);
            $pathFile = '';
            if (isset($file)) {
                $rand = rand();
                $file->saveAs($path . $rand . '_bagan' . '.' . $file->extension);
                $pathFile = $path . $rand . '_bagan' . '.' . $file->extension;
                $model->foto = $pathFile;
            }
            if ($model->save()) {
                Yii::$app->session->setFlash('success', "Bagan Mekanisme Berhasil Disimpan");
                return $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('danger', "Bagan Mekanisme Gagal Disimpan");
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing BaganMekanisme model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $pathFileOld = $model->foto;
        if ($model->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance($model, 'foto');
            $path = 'foto/bagan/';
            FileHelper::createDirectory($path, $mode = 0775, $recursive = true);
            $pathFile = '';
            if (isset($file)) {
                $rand = rand();
                $file->saveAs($path . $rand . '_bagan' . '.' . $file->extension);
                $pathFile = $path . $rand . '_bagan' . '.' . $file->extension;
                $model->foto = $pathFile;
            } else {
                $model->foto = $pathFileOld;
            }
            if ($model->save()) {
                Yii::$app->session->setFlash('success', "Bagan Mekanisme Berhasil Diubah");
                return $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('danger', "VBagan Mekanisme Gagal Diubah");
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BaganMekanisme model.
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
     * Finds the BaganMekanisme model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BaganMekanisme the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BaganMekanisme::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
