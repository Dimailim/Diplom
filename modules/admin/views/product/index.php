<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список товаров';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
//            'genre_id',
            [
                'attribute' => 'category',
                'value' => function($data){
                    return $data->genre->categories->name_category;
                },
            ],
            [
                'attribute' => 'genre_id',
                'value' => function($data){
                    return $data->genre->genre_name;
                },
            ],
            'product_name',
            'author',
            'publisher',
            //'year_of_publishing',
            //'pages',
            //'age',
            //'content:ntext',
            //'img',
            //'price',
            //'keyword',
            //'description',
            //'hit',
            //'new',
            //'sale',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
