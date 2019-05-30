<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property int $genre_id
 * @property string $product_name
 * @property string $author
 * @property string $publisher
 * @property int $year_of_publishing
 * @property int $pages
 * @property string $age
 * @property string $content
 * @property string $img
 * @property double $price
 * @property string $keyword
 * @property string $description
 * @property int $hit
 * @property int $new
 * @property int $sale
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public $image;

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    public static function tableName()
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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['genre_id', 'product_name', 'author', 'publisher', 'year_of_publishing', 'pages', 'age', 'content', 'img', 'price'], 'required'],
            [['genre_id', 'year_of_publishing', 'pages', 'hit', 'new', 'sale'], 'integer'],
            [['content'], 'string'],
            [['price'], 'number'],
            [['product_name', 'author', 'publisher', 'img', 'keyword', 'description'], 'string', 'max' => 255],
            [['age'], 'string', 'max' => 3],
            [['image'], 'file',  'extensions' => 'png, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '№ продукта',
            'category' => 'Категория',
            'genre_id' => 'Жанр',
            'product_name' => 'Название продукта',
            'author' => 'Автор/Производитель',
            'publisher' => 'Издательство/Страна производства',
            'year_of_publishing' => 'Год',
            'pages' => 'Кол-во страниц/экземпляров',
            'age' => 'Возрастное ограничение',
            'content' => 'Описание продукта',
            'image' => 'Изображение',
            'price' => 'Цена',
            'keyword' => 'Ключевые слова',
            'description' => 'Описание',
            'hit' => 'Популярный продукт',
            'new' => 'Новинка',
            'sale' => 'Скидка',
        ];
    }

    public function upload(){
        if($this->validate()){
            $path = 'images/books/'.$this->image->baseName.'.'.$this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path);
            //@$this->unlink($path); // удалить оригинал
            return true;
        }
        else{
            return false;
        }

    }
}
