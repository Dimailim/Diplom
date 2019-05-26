<?php

namespace app\models;

use app\models\SignupForm;
use yii\db\ActiveRecord;
use  yii\web\IdentityInterface;
use Yii;

class User extends ActiveRecord implements IdentityInterface
{
    /*
    public $id;
    public $username;
    public $password;
    public $email;
    public $phone;
    public $surname;
    public $name;
    public $lastname;
    public $country;
    public $address;


    private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ],
        '101' => [
            'id' => '101',
            'username' => 'demo',
            'password' => 'demo',
            'authKey' => 'test101key',
            'accessToken' => '101-token',
        ],
    ];
    */

    public static function tableName()
    {
        return 'user';
    }

    public function getOrder(){
        return $this->hasMany(Order::className(),['user_id' => 'id']);
    }

    public function getWishlist(){

        return $this->hasMany(Wishlist::className(),['user_id' => 'id']);

    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {


        return static::findOne(['username' => $username]);
    }

    public static function findByName($name)
    {


        return static::findOne(['name' => $name]);
    }

    public static function findByEmail($email)
    {


        return static::findOne(['email' => $email]);
    }
    public static function findByPhone($phone)
    {


        return static::findOne(['phone' => $phone]);
    }

    public static function findByAddress($address)
    {


        return static::findOne(['address' => $address]);
    }

    public static function findByRole($role)
    {


        return static::findOne(['role' => $role]);
    }



    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

}
