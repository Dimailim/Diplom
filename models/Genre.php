<?php
/**
 * Created by PhpStorm.
 * User: Dimailim
 * Date: 30.04.2019
 * Time: 22:45
 */

namespace app\models;


use yii\db\ActiveRecord;

class Genre extends ActiveRecord
{

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }


    public static function  tableName()
    {
        return 'genre';
    }
    public function  getCategories(){
        //поле id  таблицы category связана с  category_id  в таблицe  genre
        return $this->hasOne(Categories::className(),['id' => 'category_id']);
    }
    public  function  getProducts(){
        //поле  genre_id  таблицы products связана с  id   таблицы  genre
        return $this->hasMany(Products::className(),['genre_id' => 'id']);
    }
}