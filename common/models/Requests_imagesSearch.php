<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Requests_images;

/**
 * Requests_imagesSearch represents the model behind the search form of `common\models\Requests_images`.
 */
class Requests_imagesSearch extends Requests_images
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['imageID', 'requestID'], 'integer'],
            [['imageURL'], 'safe'],
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
        $query = Requests_images::find();

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
            'imageID' => $this->imageID,
            'requestID' => $this->requestID,
        ]);

        $query->andFilterWhere(['like', 'imageURL', $this->imageURL]);

        return $dataProvider;
    }
}
