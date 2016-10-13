<?php

namespace app\models;

use backend\models\Participant;
use Yii;

/**
 * This is the model class for table "sport".
 *
 * @property integer $id
 * @property string $name
 * @property integer $default_sportform_id
 * @property integer $weigh
 * @property integer $enet_id
 * @property string $visible
 * @property boolean $is_timer
 * @property integer $status_t
 * @property string $last_update
 * @property string $slug
 * @property string $del
 *
 * @property EventCommentTemplate[] $eventCommentTemplates
 * @property MarketGroup[] $marketGroups
 */
class Sport extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sport';
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
            [['default_sportform_id', 'weigh', 'enet_id', 'status_t'], 'integer'],
            [['is_timer'], 'boolean'],
            [['last_update'], 'safe'],
            [['name'], 'string', 'max' => 40],
            [['visible', 'del'], 'string', 'max' => 3],
            [['slug'], 'string', 'max' => 100],
            [['enet_id'], 'unique'],
            [['slug'], 'unique'],
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
            'default_sportform_id' => 'Default Sportform ID',
            'weigh' => 'Weigh',
            'enet_id' => 'Enet ID',
            'visible' => 'Visible',
            'is_timer' => 'Is Timer',
            'status_t' => 'Status T',
            'last_update' => 'Last Update',
            'slug' => 'Slug',
            'del' => 'Del',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParticipant()
    {
        return $this->hasMany(Participant::className(), ['sport_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    /*public function getMarketGroups()
    {
        return $this->hasMany(MarketGroup::className(), ['sport_id' => 'id']);
    }*/
}
