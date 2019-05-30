<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Products */

$this->title = $model->product_name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="products-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить товар', ['update', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить этот товар?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php $img = $model->getImage();  ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
            'year_of_publishing',
            'pages',
            'age',
            'content:html',
//            'img',
            [
              'attribute' => 'image',
                'value' => "<img src='/images/books/{$img->filePath}'>",
                'format' => 'html',
            ],
            'price',
            'keyword',
            'description',
            //'hit',
            [
                'attribute' => 'hit',
                'value' => !$model->hit ? "Нет" : "Да",
            ],
            //'new',
            [
                'attribute' => 'new',
                'value' => !$model->hit ? "Нет" : "Да",
            ],
            //'sale',
            [
                'attribute' => 'sale',
                'value' => !$model->hit ? "Нет" : "Да",
            ],
        ],
    ]) ?>

</div>
