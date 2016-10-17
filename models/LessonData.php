<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lesson_data".
 *
 * @property integer $id
 * @property integer $lesson_id
 * @property integer $exercise_id
 * @property string $data
 */
class LessonData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lesson_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lesson_id', 'exercise_id'], 'required'],
            [['lesson_id', 'exercise_id'], 'integer'],
            [['data'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id ',
            'lesson_id' => 'связь с таблицей уроков',
            'exercise_id' => 'связь с таблицей упражнений',
            'data' => 'Количество упражнений',
        ];
    }
}
