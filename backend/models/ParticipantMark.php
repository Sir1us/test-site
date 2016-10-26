<?php

namespace backend\models;

use Yii;


/**
 * This is the model class for table "participant_mark".
 *
 * @property integer $id
 * @property string $mark_name
 * @property string $slug
 * @property string $short_name
 * @property string $name
 * @property boolean $default
 */
class ParticipantMark extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'participant_mark';
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
            [['default'], 'boolean', 'trueValue' => true, 'falseValue' => false],
            [['mark_name', 'slug', 'short_name', 'name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mark_name' => 'Mark Name',
            'slug' => 'Slug',
            'short_name' => 'Short Name',
            'name' => 'Name',
            'default' => 'Default',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParticipant()
    {
        return $this->hasMany(Participant::className(), ['mark_id' => 'id']);
    }

    public function get_marks()
    {
        return ParticipantMark::find()->asArray()->all();
    }
}
