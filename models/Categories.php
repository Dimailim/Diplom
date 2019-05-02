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

    public static  function  tableName(){
        return 'categories';
    }
    public function getGenre(){
        //поле  category_id  таблицы genre  связана с  id   таблицы  category
        return $this->hasMany(Genre::className(), ['category_id' => 'id']);
    }

}