<?php
/**
 * Created by PhpStorm.
 * User: Dimailim
 * Date: 24.04.2019
 * Time: 23:04
 */

namespace app\models;


use yii\db\ActiveRecord;

class Books extends  ActiveRecord
{
    public static  function  tableName()
    {
        return 'books';
    }
    public function getCategories(){
        //поле id категории таблицы category связана с  category_id  в таблицe  Books
        return $this->hasOne(Categories::className(),['id'=> 'category_id']);
    }
    public function getProductsBook(){
        //поле  genre_id  таблицы products_books  связана с  id   таблицы  books
        return $this->hasMany(ProductsBook::className(),['genre_id'=>'id']);
    }
}