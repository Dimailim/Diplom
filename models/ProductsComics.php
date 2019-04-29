<?php
/**
 * Created by PhpStorm.
 * User: Dimailim
 * Date: 27.04.2019
 * Time: 22:27
 */

namespace app\models;


use yii\db\ActiveRecord;

class ProductsComics extends ActiveRecord
{
    public static function tableName()
    {
        return 'products_comics';
    }
    public function getComics(){
        //поле id категории таблицы comics связана с  category_id  в таблицe  products_comics
        return $this->hasOne(Comics::className(),['id' => 'genre_id']);
    }
}