<?php
/**
 * Created by PhpStorm.
 * User: Dimailim
 * Date: 24.04.2019
 * Time: 23:06
 */

namespace app\models;


use yii\db\ActiveRecord;

class Stationery extends ActiveRecord
{
    public static  function  tableName()
    {
        return 'stationery';
    }
    public function getCategory(){
        return $this->hasOne(Category::className(),['id' => 'category_id']);
        //поле id категории таблицы category связана с  category_id  в таблицe Stationery
    }
    public function getProductsStationery(){
        return $this->hasMany(ProductsStationery::className(),['genre_id' => 'id']);
    }
}