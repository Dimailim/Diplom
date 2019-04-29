<?php
/**
 * Created by PhpStorm.
 * User: Dimailim
 * Date: 24.04.2019
 * Time: 22:25
 */

namespace app\models;


use yii\db\ActiveRecord;

class Categories extends  ActiveRecord{
    public static  function  tableName()
    {
        return 'categories';
    }
    public function getBooks(){
        //поле  category_id  таблицы books  связана с  id   таблицы  category
        return $this->hasMany(Books::className(),['category_id'=> 'id']);
    }
    public  function  getComics(){
        return $this->hasMany(Comics::className(),['category_id'=> 'id']);
    }
    public function  getStationery(){
        return $this->hasMany(Stationery::className(),['category_id'=> 'id']);
    }
    public  function  getSouvenirs(){
        return $this->hasMany(Souvenirs::className(),['category_id'=> 'id']);
    }

}