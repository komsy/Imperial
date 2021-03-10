<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Description;

/**
 * DescriptionSearch represents the model behind the search form of `frontend\models\Description`.
 */
class DescriptionSearch extends Description
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descId', 'doctorId', 'patient'], 'integer'],
            [['treatment', 'note', 'createdAt'], 'safe'],
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
        $query = Description::find();

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
            'descId' => $this->descId,
            'doctorId' => $this->doctorId,
            'patient' => $this->patient,
            'createdAt' => $this->createdAt,
        ]);

        $query->andFilterWhere(['like', 'treatment', $this->treatment])
            ->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }
}
