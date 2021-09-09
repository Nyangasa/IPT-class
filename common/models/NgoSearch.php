<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Ngo;

/**
 * NgoSearch represents the model behind the search form of `common\models\Ngo`.
 */
class NgoSearch extends Ngo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NGO_id', 'admin_id'], 'integer'],
            [['NGO_name', 'NGO_country', 'NGO_city', 'NGO_email', 'NGO_password', 'NGO_phoneno', 'NGO_status', 'NGO_img'], 'safe'],
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
        $query = Ngo::find();

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
            'NGO_id' => $this->NGO_id,
            'admin_id' => $this->admin_id,
        ]);

        $query->andFilterWhere(['like', 'NGO_name', $this->NGO_name])
            ->andFilterWhere(['like', 'NGO_country', $this->NGO_country])
            ->andFilterWhere(['like', 'NGO_city', $this->NGO_city])
            ->andFilterWhere(['like', 'NGO_email', $this->NGO_email])
            ->andFilterWhere(['like', 'NGO_password', $this->NGO_password])
            ->andFilterWhere(['like', 'NGO_phoneno', $this->NGO_phoneno])
            ->andFilterWhere(['like', 'NGO_status', $this->NGO_status])
            ->andFilterWhere(['like', 'NGO_img', $this->NGO_img]);

        return $dataProvider;
    }
}
