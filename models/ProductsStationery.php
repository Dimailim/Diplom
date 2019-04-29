<?php
/**
 * Created by PhpStorm.
 * User: Dimailim
 * Date: 27.04.2019
 * Time: 22:55
 */

namespace app\models;


use yii\db\ActiveRecord;

class ProductsStationery extends ActiveRecord
{
    public static function tableName()
    {
        return 'products_stationery';
    }
    public function getStationery(){
        //поле id категории таблицы stationery связана с  category_id  в таблицe  products_stationery
        return $this->hasOne(Stationery::className(),['id' => 'genre_id']);
    }
}