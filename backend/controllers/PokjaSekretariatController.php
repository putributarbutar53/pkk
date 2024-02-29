<?php

namespace backend\controllers;

use Yii;
use backend\models\PokjaSekretariat;
use backend\models\search\PokjaSekretariatSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * PokjaSekretariatController implements the CRUD actions for PokjaSekretariat model.
 */
class PokjaSekretariatController extends Controller
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
     * Lists all PokjaSekretariat models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PokjaSekretariatSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexProgramPokjasekre($id_jenis_pokja) {
        $this->layout = 'main-frontend';
        $searchModel = new PokjaSekretariatSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index-program-pokjasekre', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'id_jenis_pokja' => $id_jenis_pokja,
        ]);
    }
    public function actionIndexDataPokjasekre($id_jenis_pokja) {
        $this->layout = 'main-frontend';
        $searchModel = new PokjaSekretariatSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index-data-pokjasekre', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'id_jenis_pokja' => $id_jenis_pokja,
        ]);
    }

    /**
     * Displays a single PokjaSekretariat model.
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
     * Creates a new PokjaSekretariat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PokjaSekretariat();

        if ($model->load(Yii::$app->request->post())) {

            $file = UploadedFile::getInstance($model, 'papan_data');
            $path = 'file/papan_data/';
            FileHelper::createDirectory($path, $mode = 0775, $recursive = true);
            $pathFile = '';
            if (isset($file)) {
                $rand = rand();
                $file->saveAs($path . $rand . '_data' . '.' . $file->extension);
                $pathFile = $path . $rand . '_data' . '.' . $file->extension;
                $model->papan_data = $pathFile;
            }
            if ($model->save()) {
                Yii::$app->session->setFlash('success', "Pokja Sekretariat Berhasil Disimpan");
                return $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('danger', "Pokja Sekretariat Gagal Disimpan");
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing PokjaSekretariat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
   {
        $model = $this->findModel($id);
        $pathFileOld = $model->papan_data;
        if ($model->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance($model, 'papan_data');
            $path = 'file/papan_data/';
            FileHelper::createDirectory($path, $mode = 0775, $recursive = true);
            $pathFile = '';
            if (isset($file)) {
                $rand = rand();
                $file->saveAs($path . $rand . '_data' . '.' . $file->extension);
                $pathFile = $path . $rand . '_data' . '.' . $file->extension;
                $model->papan_data = $pathFile;
            } else {
                $model->papan_data = $pathFileOld;
            }
            if ($model->save()) {
                Yii::$app->session->setFlash('success', "Pokja Sekretariat Berhasil Diubah");
                return $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('danger', "Pokja Sekretariat Gagal Diubah");
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PokjaSekretariat model.
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
     * Finds the PokjaSekretariat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PokjaSekretariat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PokjaSekretariat::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
