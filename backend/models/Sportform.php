<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "sportform".
 *
 * @property integer $id
 * @property string $name
 * @property integer $participant_num
 * @property string $participant_type
 * @property string $market_types
 * @property string $result_types
 * @property string $del
 * @property string $ut
 * @property string $scope_data
 * @property integer $sport_id
 * @property boolean $is_live
 * @property integer $pair_cnt
 * @property integer $status_t
 * @property string $last_update
 * @property string $additionally
 *
 * @property PrintLine[] $printLines
 */
class Sportform extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sportform';
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
            [['name'], 'required'],
            [['name', 'market_types', 'result_types', 'scope_data', 'additionally'], 'string'],
            [['participant_num', 'sport_id', 'pair_cnt', 'status_t'], 'integer'],
            [['ut', 'last_update'], 'safe'],
            [['is_live'], 'boolean'],
            [['participant_type'], 'string', 'max' => 15],
            [['del'], 'string', 'max' => 3],
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
            'participant_num' => 'Participant Num',
            'participant_type' => 'Participant Type',
            'market_types' => 'Market Types',
            'result_types' => 'Result Types',
            'del' => 'Del',
            'ut' => 'Ut',
            'scope_data' => 'Scope Data',
            'sport_id' => 'Sport ID',
            'is_live' => 'Is Live',
            'pair_cnt' => 'Pair Cnt',
            'status_t' => 'Status T',
            'last_update' => 'Last Update',
            'additionally' => 'Additionally',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrintLines()
    {
        return $this->hasMany(PrintLine::className(), ['sportform_id' => 'id']);
    }
}
