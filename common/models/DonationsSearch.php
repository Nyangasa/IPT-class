<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Donations;

/**
 * DonationsSearch represents the model behind the search form of `common\models\Donations`.
 */
class DonationsSearch extends Donations
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['don_id', 'req_id', 'donor_id'], 'integer'],
            [['don_date', 'don_time', 'currency', 'cardnumber', 'receipt', 'recommandation'], 'safe'],
            [['amount'], 'number'],
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
        $query = Donations::find();

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
            'don_id' => $this->don_id,
            'don_date' => $this->don_date,
            'don_time' => $this->don_time,
            'amount' => $this->amount,
            'req_id' => $this->req_id,
            'donor_id' => $this->donor_id,
        ]);

        $query->andFilterWhere(['like', 'currency', $this->currency])
            ->andFilterWhere(['like', 'cardnumber', $this->cardnumber])
            ->andFilterWhere(['like', 'receipt', $this->receipt])
            ->andFilterWhere(['like', 'recommandation', $this->recommandation]);

        return $dataProvider;
    }
}
