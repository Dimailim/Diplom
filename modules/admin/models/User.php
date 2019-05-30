<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $phone
 * @property string $surname
 * @property string $name
 * @property string $lastname
 * @property string $country
 * @property string $address
 * @property string $role
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'email', 'phone', 'country'], 'required'],
            [['username', 'password', 'email', 'phone', 'surname', 'name', 'lastname', 'country', 'address', 'role'], 'string', 'max' => 255],
            [['username'], 'unique'],
            ['email','email'],
            ['phone', 'match', 'pattern' => '/^(8)[(](\d{3})[)](\d{3})[-](\d{2})[-](\d{2})/', 'message' => 'Телефона, должно быть в формате 8(XXX)XXX-XX-XX'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Имя пользователя',
            'password' => 'Пароль',
            'email' => 'E-mail',
            'phone' => 'Номер телефона',
            'surname' => 'Фамилия',
            'name' => 'Имя',
            'lastname' => 'Отчество',
            'country' => 'Страна',
            'address' => 'Адрес',
            'role' => 'Роль',
        ];
    }
}
