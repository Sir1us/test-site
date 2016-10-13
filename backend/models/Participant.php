<?php

namespace backend\models;

use app\models\Sport;
use Yii;

/**
 * This is the model class for table "participant".
 *
 * @property integer $id
 * @property string $name
 * @property string $gender
 * @property string $type
 * @property integer $country_id
 * @property integer $sport_id
 * @property string $del
 * @property string $ut
 * @property integer $enet_id
 * @property integer $status_t
 * @property string $last_update
 * @property string $short_name
 * @property integer $mark_id
 * @property string $live_monitor_name
 * @property string $teaser_name
 *
 * @property Country $country
 * @property Country $sport
 * @property Team[] $teams
 * @property Team[] $teams0
 */
class Participant extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'participant';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('line');
    }

    public function get_all_country()
    {
        return Country::find()->select(['id','name'])->asArray()->all();
    }

    public function get_sports()
    {
        return Sport::find()->select(['id','name'])->asArray()->all();
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country_id'], 'required'],
            [['country_id', 'sport_id', 'enet_id', 'status_t', 'mark_id'], 'integer'],
            [['ut', 'last_update'], 'safe'],
            [['name', 'short_name', 'live_monitor_name', 'teaser_name'], 'string', 'max' => 50],
            [['gender', 'type'], 'string', 'max' => 15],
            [['del'], 'string', 'max' => 3],
            [['enet_id'], 'unique'],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'gender' => 'Gender',
            'type' => 'Type',
            'country_id' => 'Country ID',
            'sport_id' => 'Sport ID',
            'del' => 'Del',
            'ut' => 'Ut',
            'enet_id' => 'Enet ID',
            'status_t' => 'Status T',
            'last_update' => 'Last Update',
            'short_name' => 'Short Name',
            'mark_id' => 'Mark ID',
            'live_monitor_name' => 'Live Monitor Name',
            'teaser_name' => 'Teaser Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSport()
    {
        return $this->hasOne(Sport::className(), ['id' => 'sport_id']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    /*public function getTeams()
    {
        return $this->hasMany(Team::className(), ['participant_team_id' => 'id']);
    }*/

    /**
     * @return \yii\db\ActiveQuery
     */
    /*public function getTeams0()
    {
        return $this->hasMany(Team::className(), ['participant_athlete_id' => 'id']);
    }*/
}
