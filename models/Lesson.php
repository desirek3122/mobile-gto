<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lesson".
 *
 * @property integer $id
 * @property integer $active
 * @property integer $sub
 * @property string $header
 * @property string $datestart
 */
class Lesson extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lesson';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['active', 'sub'], 'integer'],
            [['sub', 'header', 'datestart'], 'required'],
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
            'id' => 'id урока',
            'active' => 'флаг активности урока',
            'sub' => 'Выбор недели',
            'header' => 'Название',
            'datestart' => 'Дата начала урока',
        ];
    }

    public function activate($id){
        $lessons= Lesson::find()->all();
        foreach ($lessons as $les){
            $les->active = 0;
            $les->update();
        }
        $lesson=Lesson::findOne($id);
        $lesson->active=1;
        $lesson->update();
    }
    public function deactivate($id){
        $lesson=Lesson::findOne($id);
        $lesson->active=0;
        $lesson->update();
    }
}
