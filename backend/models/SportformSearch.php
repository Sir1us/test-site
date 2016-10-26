<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Sportform;

/**
 * SportformSearch represents the model behind the search form of `backend\models\Sportform`.
 */
class SportformSearch extends Sportform
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'participant_num', 'sport_id', 'pair_cnt', 'status_t'], 'integer'],
            [['name', 'participant_type', 'market_types', 'result_types', 'del', 'ut', 'scope_data', 'last_update', 'additionally'], 'safe'],
            [['is_live'], 'boolean'],
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
        $query = Sportform::find();
        $query->orderBy('id');

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
            'participant_num' => $this->participant_num,
            'ut' => $this->ut,
            'sport_id' => $this->sport_id,
            'is_live' => $this->is_live,
            'pair_cnt' => $this->pair_cnt,
            'status_t' => $this->status_t,
            'last_update' => $this->last_update,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'participant_type', $this->participant_type])
            ->andFilterWhere(['like', 'market_types', $this->market_types])
            ->andFilterWhere(['like', 'result_types', $this->result_types])
            ->andFilterWhere(['like', 'del', $this->del])
            ->andFilterWhere(['like', 'scope_data', $this->scope_data])
            ->andFilterWhere(['like', 'additionally', $this->additionally]);

        return $dataProvider;
    }
}
