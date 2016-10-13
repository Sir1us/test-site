<?php

namespace backend\models;

use backend\models\Country;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Participant;

/**
 * ParticipantSearch represents the model behind the search form about `backend\models\Participant`.
 */
class ParticipantSearch extends Participant
{

    public $countryName;
    public $sportType;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'country_id', 'sport_id', 'enet_id', 'status_t', 'mark_id'], 'integer'],
            [['name', 'gender', 'type', 'del', 'ut', 'last_update', 'short_name', 'live_monitor_name', 'teaser_name'], 'safe'],
            [['countryName', 'sportType'], 'safe'],
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
        $query = Participant::find()->where(['participant.del'=>'no']);;
        $query->joinWith('country');
        $query->joinWith('sport');
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'id',
                'name',
                'gender',
                'type',
                'countryName' => [
                    'asc' => [ 'country_id' => SORT_ASC],
                    'desc' => ['country_id' => SORT_DESC],
                ],
                'sportType' => [
                    'asc' => [ 'sport_id' => SORT_ASC],
                    'desc' => ['sport_id' => SORT_DESC],
                ]
            ]
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
            'ut' => $this->ut,
            'enet_id' => $this->enet_id,
            'status_t' => $this->status_t,
            'last_update' => $this->last_update,
            'mark_id' => $this->mark_id,
        ]);

        $query
            ->andFilterWhere(['like', 'participant.name', $this->name])
            ->andFilterWhere(['like', 'participant.gender', $this->gender])
            ->andFilterWhere(['like', 'participant.type', $this->type])
            ->andFilterWhere(['like', 'participant.del', $this->del])
            ->andFilterWhere(['like', 'participant.short_name', $this->short_name])
            ->andFilterWhere(['like', 'participant.live_monitor_name', $this->live_monitor_name])
            ->andFilterWhere(['like', 'participant.teaser_name', $this->teaser_name])
            ->andFilterWhere(['like', 'country.name', $this->countryName])
            ->andFilterWhere(['like', 'sport.name', $this->sportType]);

        return $dataProvider;
    }
}
