<?php
/**
 * Created by PhpStorm.
 * User: Dimailim
 * Date: 16.05.2019
 * Time: 1:51
 */

namespace app\models;


use yii\db\ActiveRecord;
use Yii;


class OrderItems extends ActiveRecord{

    public static function tableName()
    {
        return 'order_items';
    }
    public function getOrder(){
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }
    public  function  getProducts(){

    }


}