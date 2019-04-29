<?php
/**
 * Created by PhpStorm.
 * User: Dimailim
 * Date: 24.04.2019
 * Time: 23:05
 */

namespace app\models;


use yii\db\ActiveRecord;

class Souvenirs extends ActiveRecord{

    public static  function  tableName(){
        return 'souvenirs';
    }
    public function getCategory(){
        //поле id категории таблицы category связана с  category_id  в таблицe souvenirs
        return $this->hasOne(Category::className(),['id'=> 'category_id']);
    }
    public  function getProductsSouvenirs(){
        //поле  genre_id  таблицы products_comics связана с  id   таблицы  souvenirs
        return $this->hasMany(ProductsSouvenirs::className(),['genre_id' => 'id']);
    }
}