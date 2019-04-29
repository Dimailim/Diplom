<?php
/**
 * Created by PhpStorm.
 * User: Dimailim
 * Date: 24.04.2019
 * Time: 23:05
 */

namespace app\models;


use yii\db\ActiveRecord;

class Comics extends  ActiveRecord{
    public static  function  tableName(){
        return 'comics';
    }
    public function getCategories(){
        //поле id категории таблицы category связана с  category_id  в таблицe  comics
        return $this->hasOne(Categories::className(),['id' => 'category_id']);
    }
    public function getProductsComics(){
        //поле  genre_id  таблицы products_comics связана с  id   таблицы  comics
        return $this->hasMany(ProductsComics::className(), ['genre_id' => 'id']);
    }
}