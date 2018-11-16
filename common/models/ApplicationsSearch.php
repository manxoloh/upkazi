<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Applications;

/**
 * ApplicationsSearch represents the model behind the search form about `common\models\Applications`.
 */
class ApplicationsSearch extends Applications
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'applicant_id', 'client_id', 'project_id'], 'integer'],
            [['cover_letter', 'resume', 'award_status', 'completion_status', 'freelancer_payment_status', 'application_date'], 'safe'],
            [['service_fee', 'freelancer_earn'], 'number'],
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
        $query = Applications::find();

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
            'applicant_id' => $this->applicant_id,
            'client_id' => $this->client_id,
            'project_id' => $this->project_id,
            'service_fee' => $this->service_fee,
            'freelancer_earn' => $this->freelancer_earn,
            'application_date' => $this->application_date,
        ]);

        $query->andFilterWhere(['like', 'cover_letter', $this->cover_letter])
            ->andFilterWhere(['like', 'resume', $this->resume])
            ->andFilterWhere(['like', 'award_status', $this->award_status])
            ->andFilterWhere(['like', 'completion_status', $this->completion_status])
            ->andFilterWhere(['like', 'freelancer_payment_status', $this->freelancer_payment_status]);

        return $dataProvider;
    }
}
