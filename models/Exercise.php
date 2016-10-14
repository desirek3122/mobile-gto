<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "exercise".
 *
 * @property integer $id
 * @property integer $sub
 * @property string $header
 * @property string $description
 * @property integer $img
 */
class Exercise extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'exercise';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sub', 'header', 'description'], 'required'],
            [['sub', 'img'], 'integer'],
            [['header', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id занятия',
            'sub' => 'связь с таблицей недель(week.id)',
            'header' => 'название',
            'description' => 'описание упражнения',
            'img' => 'агружено или нет изображение',
        ];
    }

}
