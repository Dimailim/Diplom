<?php
/**
 * Created by PhpStorm.
 * User: Dimailim
 * Date: 15.05.2019
 * Time: 22:55
 */

namespace app\models;


use yii\db\ActiveRecord;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class Order extends ActiveRecord{

    public static function tableName()
    {
        return 'order';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                 'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function getOrderItem(){
        return $this->hasMany(OrderItems::className(), ['order_id' => 'id']);
    }

    public function getUser(){
        return $this->hasOne(User::className(),['id' => 'user_id']);
    }

    public function rules()
    {
        return [
          [['name', 'email', 'phone','address'], 'required'],
          [['qty'], 'integer'],
          [['sum'],'number'],
          [['status'], 'boolean'],
          [['name','email','address'],'string', 'max' => 255],
          ['phone', 'match', 'pattern' => '/^(8)[(](\d{3})[)](\d{3})[-](\d{2})[-](\d{2})/', 'message' => 'Телефона, должно быть в формате 8(XXX)XXX-XX-XX'],
          ['email', 'email'],

        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'email' => 'Электронная почта',
            'phone' => 'Номер телефона',
            'address' => 'Адрес',
        ];
    }



}