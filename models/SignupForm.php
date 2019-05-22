<?php
/**
 * Created by PhpStorm.
 * User: Dimailim
 * Date: 21.05.2019
 * Time: 19:35
 */

namespace app\models;


use yii\base\Model;

class SignupForm extends Model
{
    public $username;
    public $password;
    public $email;
    public $phone;
    public $surname;
    public $name;
    public $lastname;
    public $country;
    public $address;

    public function rules()
    {
        return [
          [[ 'username','password', 'email','phone','country'],'required', 'message' => 'Заполните поле' ],
          ['username', 'unique', 'targetClass' => User::className(),  'message' => 'Этот логин уже занят'],
          [[ 'surname','name', 'lastname','address'],  'string', 'max' => 255],
            [['username', 'surname','name', 'lastname','address', 'country'],  'safe'],
          ['email', 'email'],
          ['phone', 'match', 'pattern' => '/^(8)[(](\d{3})[)](\d{3})[-](\d{2})[-](\d{2})/', 'message' => 'Телефона, должно быть в формате 8(XXX)XXX-XX-XX'],

        ];
    }
    public function attributeLabels()
    {
        return [
            'username'  => 'Логин',
            'password' => 'Пароль',
            'email' => 'E-mail',
            'surname' => 'Фамилия',
            'name' => 'Имя',
            'lastname' => 'Отчество',
            'country' => 'Cтрана',
            'address' => 'Адрес',
            'phone' => 'Мобильный номер',
        ];
    }

}