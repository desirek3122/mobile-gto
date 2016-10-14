<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "session".
 *
 * @property integer $id
 * @property string $header
 * @property string $datestart
 */
class Session extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'session';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['header', 'datestart'], 'required'],
            [['datestart'], 'safe'],
            [['header'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id сессии',
            'header' => 'Название',
            'datestart' => 'Дата начала сессии',
        ];
    }
}
