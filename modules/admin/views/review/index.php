<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список отзывов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="review-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?//= Html::a('Create Review', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'id',
            //'product_id',
            [
                'attribute' => 'product_id',
                'value' => function($data){
                    return $data->product->product_name;
                },
            ],
            'name',
            'email:email',
            'time',
            'data',
            //'comment:ntext',

            ['class' => 'yii\grid\ActionColumn',
             'template' => '{view} {delete}'
            ],
        ],
    ]); ?>


</div>
