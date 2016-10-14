<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $audioFile;

    public function rules()
    {
        return [
            [['audioFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'mp3'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $week=new Week;
            $week_id=$week->id;
            $filename=implode('/', str_split($week_id));
            $this->audioFile->saveAs('uploads/' . $filename . '.' . $this->audioFile->extension);
            return true;
        } else {
            return false;
        }
    }
}