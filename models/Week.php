<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "week".
 *
 * @property integer $id
 * @property integer $sub
 * @property string $header
 * @property string $datestart
 * @property integer $audio1
 * @property integer $audio2
 */
class Week extends \yii\db\ActiveRecord
{
    public $audioFile;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'week';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sub', 'header', 'datestart'], 'required'],
            [['sub', 'audio1', 'audio2'], 'integer'],
            [['datestart'], 'safe'],
            [['header'], 'string', 'max' => 255],
            [['audioFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'mp3'],
        ];
    }

    public function upload()
    {

        if (!empty($_FILES['Week']['name']['audioFile'])){
            $save=new UploadedFile();
            $filename=$this->id;
            //mkdir('../uploads/audio1/', 0777, 1);
            $save->saveAs('../uploads/audio1/' . $filename  . '.mp3');
            return true;

        }

    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id недели',
            'sub' => 'Сессия',
            'header' => 'Название',
            'datestart' => 'Дата начала',
            'audio1' => 'загружена или нет аудиозапись',
            'audio2' => 'загружена или нет аудиозапись',
        ];
    }
}
