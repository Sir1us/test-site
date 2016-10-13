<?php

namespace backend\models;

use Yii;
use \yii\db\ActiveRecord;
/**
 * This is the model class for table "auto".
 *
 * @property integer $id
 * @property string $name
 */
class Auto extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function get()
    {
        return 'auto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string'],
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
        ];
    }
}
