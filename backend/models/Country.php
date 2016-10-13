<?php

namespace backend\models;

use Yii;
use \yii\db\ActiveRecord;

/**
 * This is the model class for table "country".
 *
 * @property integer $id
 * @property string $name
 * @property string $del
 * @property string $ut
 * @property integer $enet_id
 * @property integer $weigh
 * @property string $is_work
 * @property string $iso1_code
 * @property string $iso3_code
 * @property integer $num_code
 * @property integer $services_id
 * @property integer $status_t
 * @property string $last_update
 *
 * @property Participant[] $participants
 */
class Country extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('line');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ut', 'last_update'], 'safe'],
            [['enet_id', 'weigh', 'num_code', 'services_id', 'status_t'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['del', 'iso1_code', 'iso3_code'], 'string', 'max' => 3],
            [['is_work'], 'string', 'max' => 1],
            [['enet_id'], 'unique'],
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
            'del' => 'Del',
            'ut' => 'Ut',
            'enet_id' => 'Enet ID',
            'weigh' => 'Weigh',
            'is_work' => 'Is Work',
            'iso1_code' => 'Iso1 Code',
            'iso3_code' => 'Iso3 Code',
            'num_code' => 'Num Code',
            'services_id' => 'Services ID',
            'status_t' => 'Status T',
            'last_update' => 'Last Update',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParticipants()
    {
        return $this->hasMany(Participant::className(), ['country_id' => 'id']);
    }
}
