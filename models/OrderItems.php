<?php
/**
 * Created by PhpStorm.
 * User: Dimailim
 * Date: 16.05.2019
 * Time: 1:51
 */

namespace app\models;


use yii\db\ActiveRecord;

class OrderItems extends ActiveRecord{

    public static function tableName()
    {
        return 'order_item';
    }
    public function getOrder(){

    }
    public  function  getProducts(){

    }

}