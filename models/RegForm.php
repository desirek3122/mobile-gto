<?php
namespace app\models;
use yii\base\Model;
use Yii;
class RegForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $patronymic;
    public $name;
    public $surname;
    public $phone;
    public $sub;
    public $status;
    public $admin;
    public function rules()
    {
        return [
            [['username', 'email', 'password'],'filter', 'filter' => 'trim'],
            [['email', 'password'],'required'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['password', 'string', 'min' => 6, 'max' => 255],
            ['username', 'unique',
                'targetClass' => User::className(),
                'message' => 'Это имя уже занято.'],
            ['email', 'email'],
            ['email', 'unique',
                'targetClass' => User::className(),
                'message' => 'Эта почта уже занята.'],
            ['status', 'default', 'value' => User::STATUS_ACTIVE, 'on' => 'default'],
            ['status', 'in', 'range' =>[
                User::STATUS_NOT_ACTIVE,
                User::STATUS_ACTIVE
            ]],
        ];
    }
    public function attributeLabels()
    {
        return [
            'username' => 'Имя пользователя',
            'email' =>g 'Эл. почта',
            'password' => 'Пароль',
            'sub' => 'Группа',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'phone' => 'Телефон',
        ];
    }
    public function reg()
    {
        $user = new User();
        $user->email = $this->email;
        $user->status = $this->status;
        $user->setPassword($this->password);
        $user->name= $this->name;
        $user->surname= $this->surname;
        $user->patronymic= $this->patronymic;
        $user->phone= $this->phone;
        $user->sub= $this->sub;
        $user->generateAuthKey();
        return $user->save() ? $user : null;
    }

}