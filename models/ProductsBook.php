<?php
/**
 * Created by PhpStorm.
 * User: Dimailim
 * Date: 27.04.2019
 * Time: 22:02
 */

namespace app\models;


use yii\db\ActiveRecord;

class ProductsBook extends ActiveRecord
{
    public static function tableName(){
        return 'products_book';
    }
    public function getBooks(){
        //поле id категории таблицы books связана с  category_id  в таблицe products_book
        return $this->hasOne(Books::className(),['id'=>'genre_id']);
    }
}