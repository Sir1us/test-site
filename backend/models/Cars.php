<?php

namespace backend\models;
use \yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "cars".
 *
 * @property integer $id
 * @property string $name
 * @property integer $auto_color
 */
class Cars extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cars';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string'],
            [['auto_color'], 'integer'],
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
            'auto_color' => 'Auto Color',
        ];
    }
}
