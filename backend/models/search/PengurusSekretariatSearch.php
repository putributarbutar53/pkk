<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PengurusSekretariat;

/**
 * PengurusSekretariatSearch represents the model behind the search form of `backend\models\PengurusSekretariat`.
 */
class PengurusSekretariatSearch extends PengurusSekretariat
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_by', 'updated_by', 'active'], 'integer'],
            [['ketua', 'ketua_1', 'sekretaris', 'bendahara', 'created_at', 'updated_at'], 'safe'],
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
        $query = PengurusSekretariat::find();

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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'ketua', $this->ketua])
            ->andFilterWhere(['like', 'ketua_1', $this->ketua_1])
            ->andFilterWhere(['like', 'sekretaris', $this->sekretaris])
            ->andFilterWhere(['like', 'bendahara', $this->bendahara]);

        return $dataProvider;
    }
}
