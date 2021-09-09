<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Ngo_uploads;

/**
 * Ngo_uploadsSearch represents the model behind the search form of `common\models\Ngo_uploads`.
 */
class Ngo_uploadsSearch extends Ngo_uploads
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['upload_id', 'NGO_id'], 'integer'],
            [['path', 'upload_date', 'upload_time'], 'safe'],
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
        $query = Ngo_uploads::find();

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
            'upload_id' => $this->upload_id,
            'upload_date' => $this->upload_date,
            'upload_time' => $this->upload_time,
            'NGO_id' => $this->NGO_id,
        ]);

        $query->andFilterWhere(['like', 'path', $this->path]);

        return $dataProvider;
    }
}
