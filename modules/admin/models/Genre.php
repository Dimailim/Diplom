<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "genre".
 *
 * @property int $id
 * @property int $category_id
 * @property string $genre_name
 * @property string $keyword
 * @property string $description
 */
class Genre extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id'], 'required'],
            [['category_id'], 'integer'],
            [['keyword'], 'string'],
            [['genre_name'], 'string', 'max' => 220],
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '№ жанра',
            'category_id' => 'Категория',
            'genre_name' => 'Имя жанра',
            'keyword' => 'Ключевые слова',
            'description' => 'Описание',
        ];
    }
}
