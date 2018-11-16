<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Projects;

/**
 * ProjectsSearch represents the model behind the search form about `common\models\Projects`.
 */
class ProjectsSearch extends Projects
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cat_id', 'client_id'], 'integer'],
            [['project_name', 'project_description', 'responsibilities', 'requirements', 'location', 'document', 'reference_token', 'pesapal_traking_id', 'payment_method', 'payment_status', 'status', 'expected_start_date', 'expected_delivery_date', 'date_posted'], 'safe'],
            [['budget'], 'number'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Projects::find();

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
            'cat_id' => $this->cat_id,
            'client_id' => $this->client_id,
            'budget' => $this->budget,
            'expected_start_date' => $this->expected_start_date,
            'expected_delivery_date' => $this->expected_delivery_date,
            'date_posted' => $this->date_posted,
        ]);

        $query->andFilterWhere(['like', 'project_name', $this->project_name])
            ->andFilterWhere(['like', 'project_description', $this->project_description])
            ->andFilterWhere(['like', 'responsibilities', $this->responsibilities])
            ->andFilterWhere(['like', 'requirements', $this->requirements])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'document', $this->document])
            ->andFilterWhere(['like', 'reference_token', $this->reference_token])
            ->andFilterWhere(['like', 'pesapal_traking_id', $this->pesapal_traking_id])
            ->andFilterWhere(['like', 'payment_method', $this->payment_method])
            ->andFilterWhere(['like', 'payment_status', $this->payment_status])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
