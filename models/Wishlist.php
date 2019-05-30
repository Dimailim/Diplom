<?php
/**
 * Created by PhpStorm.
 * User: Dimailim
 * Date: 22.05.2019
 * Time: 17:33
 */

namespace app\models;


use yii\db\ActiveRecord;

class Wishlist extends ActiveRecord{

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    public static function tableName()
    {
        return 'wishlist';
    }

    public function getUser(){
       return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

}