<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "review".
 *
 * @property int $id
 * @property int $product_id
 * @property string $name
 * @property string $email
 * @property string $time
 * @property string $data
 * @property string $comment
 */
class Review extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'review';
    }

    public function getProduct(){
        return $this->hasOne(Products::className(),['id'=>'product_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'name', 'email', 'time', 'data', 'comment'], 'required'],
            [['product_id'], 'integer'],
            [['time', 'data'], 'safe'],
            [['comment'], 'string'],
            [['name', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Отзыв к товару',
            'name' => 'Имя',
            'email' => 'E-mail',
            'time' => 'Время отправки',
            'data' => 'Дата отправки',
            'comment' => 'Отзыв',
        ];
    }
}
