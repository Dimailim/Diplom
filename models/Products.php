<?php
/**
 * Created by PhpStorm.
 * User: Dimailim
 * Date: 30.04.2019
 * Time: 22:52
 */

namespace app\models;


use yii\db\ActiveRecord;

class Products extends ActiveRecord
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
        return 'products';
    }
    public function getGenre(){
        //поле id таблицы products связана с  genre_id  в таблицe  genre
        return $this->hasOne(Genre::className(),['id' => 'genre_id']);
    }
    public function getReview(){

        return $this->hasMany(Review::className(),['product_id' => 'id']);
    }
}