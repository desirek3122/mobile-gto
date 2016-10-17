<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property integer $sub
 * @property string $name
 * @property string $surname
 * @property string $patronymic
 * @property string $phone
 * @property string $md5pass
 * @property string $email
 * @property integer $status
 * @property integer $admin
 * @property string $secret_key
 * @property string $auth_key
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    const STATUS_NOT_ACTIVE = 1;
    const STATUS_ACTIVE = 2;
    const STATUS_ADMIN = 1;
    const STATUS_USER = 0;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['admin', 'in', 'range' => [self::STATUS_USER, self::STATUS_ADMIN]],
            [['md5pass', 'email'], 'required'],
            [['sub', 'status', 'admin'], 'integer'],
            [['name', 'surname', 'patronymic', 'phone', 'md5pass', 'email', 'secret_key', 'auth_key'], 'string', 'max' => 255],
            [['email'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id пользователя',
            'sub' => 'связь с таблицей групп пользователей (group.id)',
            'name' => 'имя',
            'surname' => 'фамилия',
            'patronymic' => 'отчество',
            'phone' => 'телефон',
            'md5pass' => 'хэш пароля',
            'email' => 'почта-логин',
            'status' => 'может или нет авторизоваться (0 по-умолчанию, то есть может)',
            'admin' => '0 по умолчанию, если стоит 1 значит администратор (на базе этого поля определяется пускать или нет в админ часть)',
            'secret_key' => 'Secret Key',
            'auth_key' => 'Auth Key',
        ];
    }
    public static function isUserAdmin($email)
    {
        if (static::findOne(['email' => $email, 'admin' => self::STATUS_ADMIN]))
        {
            return true;
        } else {
            return false;
        }
    }
    /* Поиск */
    /** Находит пользователя по имени и возвращает объект найденного пользователя.
     *  Вызываеться из модели LoginForm.
     */
    /* Находит пользователя по емайл */

    public static function findByEmail($email)
    {
        return static::findOne([
            'email' => $email
        ]);
    }
    public static function findBySecretKey($key)
    {
        if (!static::isSecretKeyExpire($key))
        {
            return null;
        }
        return static::findOne([
            'secret_key' => $key,
        ]);
    }
    /* Хелперы */
    public function generateSecretKey()
    {
        $this->secret_key = Yii::$app->security->generateRandomString().'_'.time();
    }
    public function removeSecretKey()
    {
        $this->secret_key = null;
    }
    public static function isSecretKeyExpire($key)
    {
        if (empty($key))
        {
            return false;
        }
        $expire = Yii::$app->params['secretKeyExpire'];
        $parts = explode('_', $key);
        $timestamp = (int) end($parts);
        return $timestamp + $expire >= time();
    }
    /**
     * Генерирует хеш из введенного пароля и присваивает (при записи) полученное значение полю password_hash таблицы user для
     * нового пользователя.
     * Вызываеться из модели RegForm.
     */
    public function setPassword($password)
    {
        $this->md5pass = Yii::$app->security->generatePasswordHash($password);
    }
    /**
     * Генерирует случайную строку из 32 шестнадцатеричных символов и присваивает (при записи) полученное значение полю auth_key
     * таблицы user для нового пользователя.
     * Вызываеться из модели RegForm.
     */
    public function generateAuthKey(){
        $this->auth_key= Yii::$app->security->generateRandomString();
    }
    /**
     * Сравнивает полученный пароль с паролем в поле password_hash, для текущего пользователя, в таблице user.
     * Вызываеться из модели LoginForm.
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->md5pass);
    }
    /* Аутентификация пользователей */
    public static function findIdentity($id)
    {
        return static::findOne([
            'id' => $id,
            'status' => self::STATUS_ACTIVE
        ]);
    }
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }
    public function getId()
    {
        return $this->id;
    }
    public function getAuthKey()
    {
        return $this->auth_key;
    }
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

}
