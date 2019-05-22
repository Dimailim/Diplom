<?php
/**
 * Created by PhpStorm.
 * User: Dimailim
 * Date: 22.05.2019
 * Time: 22:04
 */

namespace app\models;


use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class Review extends ActiveRecord{

    public static function tableName(){
        return 'review';
    }

    public function getProduct(){
        return $this->hasOne(Products::className(),['id'=>'product_id']);
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['data', 'time'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['data','time'],
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function rules(){
        return [
            [['name', 'email', 'comment'], 'required'],
            [['name','email','comment'], 'safe'],
            ['email','email'],
        ];
    }
    public function attributeLabels()
    {
        return[
            'name' => 'Имя',
            'email' => 'E-mail',
            'comment' => 'Ваше сообщение',
        ];
    }

}