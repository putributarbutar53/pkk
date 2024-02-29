<?php

namespace backend\controllers;

use Yii;
use backend\models\PengurusPokja;
use backend\models\search\PengurusPokjaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PengurusPokjaController implements the CRUD actions for PengurusPokja model.
 */
class PengurusPokjaController extends Controller
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
     * Lists all PengurusPokja models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PengurusPokjaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PengurusPokja model.
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
     * Creates a new PengurusPokja model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PengurusPokja();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    public function actionCreateNew() {
        $model = new PengurusPokja();
        $modelAnggotaPokja = new \backend\models\AnggotaPokja();
        $modelAnggota = [new \backend\models\AnggotaPokja];
        if ($model->load(Yii::$app->request->post()) && $modelAnggotaPokja->load(Yii::$app->request->post())) {
            $sukses = 0;
            if ($model->save(false)) {
                foreach ($_POST['AnggotaPokja'] as $anggotaPokja) {
                    $modelAnggotaPokja = new \backend\models\AnggotaPokja();
                    $modelAnggotaPokja->id_pengurus_pokja = $model->id;
                    $modelAnggotaPokja->nama = $anggotaPokja['nama'];
                    if ($modelAnggotaPokja->save(false)) {
                        $sukses = 1;
                    }
                }
            }
            if ($sukses == 1) {
                Yii::$app->session->setFlash('success', "Pengurus dan Anggota Pokja Berhasil Ditambahkan");
            } else {
                Yii::$app->session->setFlash('danger', "Pengurus dan Anggota Pokja Gagal Ditambahkan");
            }
            return $this->redirect(['index']);
        }

        return $this->render('_formCreateNew', [
                    'model' => $model,
                    'modelAnggota' => (empty($modelAnggota)) ? [new \backend\models\AnggotaPokja] : $modelAnggota,
        ]);
    }

    /**
     * Updates an existing PengurusPokja model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelAnggotaPokja = new \backend\models\AnggotaPokja();
        $findAnggotaPokja = \backend\models\AnggotaPokja::find()
                ->where(['id_pengurus_pokja' => $model->id, 'active' => 10])
                ->all();
        $modelAnggota = [$findAnggotaPokja];

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('_formCreateNew', [
                    'model' => $model,
                    'modelAnggota' => (empty($modelAnggota)) ? [$findAnggotaPokja] : $modelAnggota,
        ]);
    }

    /**
     * Deletes an existing PengurusPokja model.
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
     * Finds the PengurusPokja model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PengurusPokja the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PengurusPokja::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
