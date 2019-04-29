<?php
/**
 * Created by PhpStorm.
 * User: Dimailim
 * Date: 27.04.2019
 * Time: 22:39
 */

namespace app\models;


use yii\db\ActiveRecord;

class ProductsSouvenirs extends ActiveRecord
{
    public static function tableName()
    {
        return 'products_souvenirs';
    }
    public function getSouvenirs(){
        //поле id категории таблицы souvenirs связана с  category_id  в таблицe  products_souvenirs
        return $this->hasOne(Souvenirs::className(),['id' => 'genre_id']);
    }
}