<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Doctor;

/**
 * DoctorSearch represents the model behind the search form of `frontend\models\Doctor`.
 */
class DoctorSearch extends Doctor
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['doctorId', 'adminId', 'phoneNumber', 'password', 'category'], 'integer'],
            [['doctorName', 'email', 'address', 'createdAt'], 'safe'],
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
            'adminId' => $this->adminId,
            'phoneNumber' => $this->phoneNumber,
            'password' => $this->password,
            'category' => $this->category,
            'createdAt' => $this->createdAt,
        ]);

        $query->andFilterWhere(['like', 'doctorName', $this->doctorName])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
}
