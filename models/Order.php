<?php
/**
 * Created by PhpStorm.
 * User: Dimailim
 * Date: 15.05.2019
 * Time: 22:55
 */

namespace app\models;


use yii\db\ActiveRecord;

class Order extends ActiveRecord{

    public static function tableName()
    {
        return 'order';
    }

    public function getOrderItem(){

    }
    public function getUser(){

    }

}