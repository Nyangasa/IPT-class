<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Donor;

/**
 * DonorSearch represents the model behind the search form of `common\models\Donor`.
 */
class DonorSearch extends Donor
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['donor_id'], 'integer'],
            [['donor_fname', 'donor_lname', 'donor_email', 'donor_pwd', 'donor_country', 'donor_city', 'donor_img'], 'safe'],
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
        $query = Donor::find();

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
            'donor_id' => $this->donor_id,
        ]);

        $query->andFilterWhere(['like', 'donor_fname', $this->donor_fname])
            ->andFilterWhere(['like', 'donor_lname', $this->donor_lname])
            ->andFilterWhere(['like', 'donor_email', $this->donor_email])
            ->andFilterWhere(['like', 'donor_pwd', $this->donor_pwd])
            ->andFilterWhere(['like', 'donor_country', $this->donor_country])
            ->andFilterWhere(['like', 'donor_city', $this->donor_city])
            ->andFilterWhere(['like', 'donor_img', $this->donor_img]);

        return $dataProvider;
    }
}
