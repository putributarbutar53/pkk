<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Berita;

/**
 * BeritaSearch represents the model behind the search form of `backend\models\Berita`.
 */
class BeritaSearch extends Berita
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_kategori', 'jumlah_view', 'created_by', 'updated_by', 'active', 'id_master_status'], 'integer'],
                [['judul', 'isi', 'foto', 'file', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Berita::find()
                ->where(['id_master_status' => 1, 'id_kategori' => 1]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_kategori' => $this->id_kategori,
            'id_master_status' => $this->id_master_status,
            'jumlah_view' => $this->jumlah_view,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'judul', $this->judul])
            ->andFilterWhere(['like', 'isi', $this->isi])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'file', $this->file]);

        return $dataProvider;
    }
    public function searchKecamatan($params) {
        $query = Berita::find()
                ->where(['id_master_status' => 1, 'id_kategori' => 2]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_kategori' => $this->id_kategori,
            'id_master_status' => $this->id_master_status,
            'jumlah_view' => $this->jumlah_view,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'judul', $this->judul])
                ->andFilterWhere(['like', 'isi', $this->isi])
                ->andFilterWhere(['like', 'foto', $this->foto])
                ->andFilterWhere(['like', 'file', $this->file]);

        return $dataProvider;
    }

    public function searchDiterima($params) {
        $query = Berita::find()
                ->where(['id_master_status' => 1, 'id_penulis' => \Yii::$app->user->id]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_kategori' => $this->id_kategori,
            'id_master_status' => $this->id_master_status,
            'jumlah_view' => $this->jumlah_view,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'judul', $this->judul])
                ->andFilterWhere(['like', 'isi', $this->isi])
                ->andFilterWhere(['like', 'foto', $this->foto])
                ->andFilterWhere(['like', 'file', $this->file]);

        return $dataProvider;
    }

    public function searchDireview($params) {
        $query = Berita::find()
                ->where(['id_master_status' => 2, 'id_penulis' => \Yii::$app->user->id]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_kategori' => $this->id_kategori,
            'id_master_status' => $this->id_master_status,
            'jumlah_view' => $this->jumlah_view,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'judul', $this->judul])
                ->andFilterWhere(['like', 'isi', $this->isi])
                ->andFilterWhere(['like', 'foto', $this->foto])
                ->andFilterWhere(['like', 'file', $this->file]);

        return $dataProvider;
    }
    public function searchMasuk($params) {
        $query = Berita::find()
                ->where(['id_master_status' => 2]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_kategori' => $this->id_kategori,
            'id_master_status' => $this->id_master_status,
            'jumlah_view' => $this->jumlah_view,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'judul', $this->judul])
                ->andFilterWhere(['like', 'isi', $this->isi])
                ->andFilterWhere(['like', 'foto', $this->foto])
                ->andFilterWhere(['like', 'file', $this->file]);

        return $dataProvider;
    }

    public function searchDitolak($params) {
        $query = Berita::find()
                ->where(['id_master_status' => 3, 'id_penulis' => \Yii::$app->user->id]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_kategori' => $this->id_kategori,
            'id_master_status' => $this->id_master_status,
            'jumlah_view' => $this->jumlah_view,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'judul', $this->judul])
                ->andFilterWhere(['like', 'isi', $this->isi])
                ->andFilterWhere(['like', 'foto', $this->foto])
                ->andFilterWhere(['like', 'file', $this->file]);

        return $dataProvider;
    }

}
