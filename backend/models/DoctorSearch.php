<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Doctor;

/**
 * DoctorSearch represents the model behind the search form of `backend\models\Doctor`.
 */
class DoctorSearch extends Doctor
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['doctorId', 'userId', 'phoneNumber', 'category'], 'integer'],
            [['doctorName', 'email', 'address', 'password', 'createdAt'], 'safe'],
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
        $query = Doctor::find();

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
            'doctorId' => $this->doctorId,
            'userId' => $this->userId,
            'phoneNumber' => $this->phoneNumber,
            'category' => $this->category,
            'createdAt' => $this->createdAt,
        ]);

        $query->andFilterWhere(['like', 'doctorName', $this->doctorName])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'password', $this->password]);

        return $dataProvider;
    }
}
